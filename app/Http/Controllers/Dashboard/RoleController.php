<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Company;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{

      public function index(Request $request) {

          $roles = Role::query();

          return view('dashboard.roles.index', [
              'items'   => $roles->paginate(config('ui.admin.page_size')),
              'page'    => $request->query('page')
          ]);
      }

      public function create(Request $request) {

        $page = $request->query('page');
        $permissions = Permission::orderBy('name', 'asc')->pluck('name', 'id');

        return view('dashboard.roles.create', [
            'cancel_link'   => route('dashboard::roles.index', ['page' => $page]),
            'permissions'   => $permissions,
            'permission_id' => (!is_null(old('permission_id')))? old('permission_id'):[],
            'page'          => $page,

        ]);

      }

      public function store(RoleRequest $request)
      {
          \DB::beginTransaction();

            $role = Role::create([
              'display_name'  => $request->get('display_name'),
              'name'          => $request->get('name'),
              'description'   => $request->get('description'),
            ]);

            $permissions = Permission::whereIn('id',$request->get('permission_id'))->get();
            $role->syncPermissions($permissions);

          \DB::commit();

          return redirect()->route('dashboard::roles.index')->with([
              'message' => "Se ha Actualizado el role ". $role->display_name,
              'level'   => 'success'
          ]);
      }

      public function edit(Request $request, $id) {
          $role = Role::findOrFail($id);
          $page = $request->query('page');

          $permissions = Permission::orderBy('name', 'asc')->pluck('name', 'id');

          return view('dashboard.roles.edit', [
              'model'          => $role,
              'permissions'    => $permissions,
              'permission_id'  => $request->old('permission_id', $role->permissions->pluck('id')->toArray()),
              'page'           => $request->query('page'),
              'cancel_link'   => route('dashboard::roles.index', ['page' => $page]),
          ]);
      }

      public function update(RoleRequest $request, $id)
      {

          \DB::beginTransaction();

            $role = Role::findOrFail($id);

            $role->update([
              'display_name' => $request->get('display_name'),
              'name'         => $request->get('name'),
              'description'  => $request->get('description'),
            ]);

            $permissions = Permission::whereIn('id',$request->get('permission_id'))->get();

            $role->syncPermissions($permissions);

          \DB::commit();

          return redirect()->route('dashboard::roles.index')->with([
              'message' => "Se ha Actualizado el role ". $role->name,
              'level' => 'success'
          ]);
      }

      public function destroy(Role $role)
      {
          $role->delete();

          return back()->with('info', 'Rol eliminado con éxito');
      }
}
