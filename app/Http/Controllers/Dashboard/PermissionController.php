<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;


class PermissionController extends Controller
{

    public function index(Request $request)
    {
        $permissions = Permission::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $permissions->where(function ($q) use ($search) {
                $q->orWhere('name', 'like', "%$search%");
            });
        }

        return view('dashboard.permissions.index', [
            'items' => $permissions->paginate(config('ui.dashboard.page_size')),
            'page' => $request->query('page')
        ]);
    }

    public function create(Request $request) {

      $page = $request->query('page');
      $roles = Role::orderBy('name', 'asc')->pluck('name', 'id');
      return view('dashboard.permissions.create', [
          'roles'         => $roles,
          'role_id'       => $request->old('role_id'),
          'page'          => $request->query('page'),
          'cancel_link'   => route('dashboard::permissions.index', ['page' => $page])
      ]);

    }

    public function store(PermissionRequest $request) {

      \DB::beginTransaction();

        $permission = Permission::create([
          'display_name' => $request->get('display_name'),
          'name' => $request->get('name'),
          'description' => $request->get('description'),
        ]);

      \DB::commit();

      return redirect()->route('dashboard::permissions.index')->with([
          'message' => "Se creado el permiso ". $permission->display_name,
          'level' => 'success'
      ]);

    }

    public function edit(Request $request, $id)
    {
        $page = $request->query('page');

        $permission = Permission::findOrFail($id);
        return view('dashboard.permissions.edit', [
            'model'         => $permission,
            'page'          => $request->query('page'),
            'cancel_link'   => route('dashboard::permissions.index', ['page' => $page])
        ]);
    }

    public function update(PermissionRequest $request, $id) {


        \DB::beginTransaction();

          $permission = Permission::findOrFail($id);

          $permission->update([
            'display_name' => $request->get('display_name'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
          ]);

        \DB::commit();

        return redirect()->route('dashboard::permissions.index')->with([
            'message' => "Se ha Actualizado el permiso ". $permission->name,
            'level' => 'success'
        ]);

    }
}
