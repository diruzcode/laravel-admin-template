<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Exports\UserCollectionExport;
use App\Exports\UserQueryExport;
use App\Exports\UserViewExport;
use App\Exports\UserMappingExport;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $this->authorize('listar-usuarios');

        $users = User::query();

        if (!Auth::user()->hasRole('super-administrador')){
            $users = $users->where('hidden', false);
        }

        return view('dashboard.users.index', [
            'items' => $users->paginate(config('ui.dashboard.page_size')),
            'page' => $request->query('page')
        ]);
    }

    public function create(Request $request)
    {
        $this->authorize('crear-usuarios');
        $model = new User;
        $page = $request->get('page');
        $roles = Role::query();

        if (!$request->user()->hasRole('super-administrador')){
            $roles->where('hidden', false);
        }

        return view('dashboard.users.create', [
            'hidden'            => $request->old('hidden', false),
            'model'            => $model,
            'page'              => $request->query('page'),
            'roles'             => $roles->orderBy('display_name', 'asc')->pluck('display_name', 'id'),
            'role_id'           => (!is_null(old('role_id')))? old('role_id'):[],
            'cancel_link'   => route('dashboard::users.index', ['page' => $page])
        ]);
    }

    public function store(UserRequest $request)
    {

        $this->authorize('crear-usuarios');

        \DB::beginTransaction();

          $user = User::create(array_merge(
              [
                  'status' => $request->has('status') ?? 'inactive',
                  'hidden' => $request->has('hidden')
              ],
              $request->all()
          ));

          $user->roles()->attach($request->input('role_id'));

        \DB::commit();

        return redirect()->route('dashboard::users.index')->with([
            'message' => 'Se ha creado con éxito al usuario [' . $user->completeName() . ']',
            'level' => 'success'
        ]);
    }


    public function edit(Request $request, $id)
    {
        $this->authorize('editar-usuarios');
        $page = $request->get('page');

        $user = User::findOrFail($id);

        if($user->hasRole('super-administrador')){
          $roles = Role::orderBy('display_name', 'asc')->pluck('display_name', 'id');
        }else{
          $roles = Role::where('name','!=','super-administrador')->orderBy('display_name', 'asc')->pluck('display_name', 'id');
        }
        return view('dashboard.users.edit', [
            'model' => $user,
            'page' => $request->query('page'),
            'hidden' => $request->old('hidden', $user->hidden),
            'roles' => $roles,
            'role_id' => $request->old('role_id', $user->roles->pluck('id')->toArray()),
            'cancel_link'   => route('dashboard::users.index', ['page' => $page])
        ]);
    }

    public function update(UserRequest $request, $id)
    {

        $this->authorize('editar-usuarios');

        $user = User::findOrFail($id);
        $user->update(array_merge(
            [
                'status' => $request->has('status') ?? 'inactive',
                'hidden' => $request->has('hidden')
            ],
            $request->except('password', 'password_confirmation')
        ));

        if (strlen(trim($request->get('password'))) > 0){
            $user->password = $request->get('password');
            $user->save();
        }

        $user->roles()->sync($request->input('role_id'));

        return redirect()->route('dashboard::users.index')->with([
            'message' => 'Se han actualizado los datos del usuario [' . $user->completeName() . ']',
            'level' => 'success'
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $this->authorize('eliminar-usuarios');

        $user = User::findOrFail($id);

        User::destroy($id);

        return redirect('/admin/users?page=' . $request->query('page'))->with([
            'message' => 'Se ha eliminado con exito al usuario [' . $user->name . ']',
            'level' => 'success'
        ]);
    }

    public function toggleAccess(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->toggleAccess($request->get('type'));
        $user->save();

        return redirect()->route('dashboard::users.index', ['page' => $request->query('page')])->with([
            'message' => 'Se han actualizado los accesos del usuario [' . $user->completeName() . ']',
            'level' => 'success'
        ]);


    }


    public function export(Request $request)
    {

      $type = $request->get('type');

      switch ($type) {
        case 'collection':
            return (new UserCollectionExport)->download('UserCollectionExport.xlsx');
          break;
        case 'query':
            return (new UserQueryExport)->download('UserQueryExport.xlsx');
          break;
        case 'view':
            return (new UserViewExport)->download('UserViewExport.xlsx');
          break;
        case 'mapping':
            return (new UserMappingExport)->download('UserMappingExport.xlsx');
          break;
        default:
          return (new UserViewExport)->download('UserViewExport.xlsx');
          break;
      }
    }

}
