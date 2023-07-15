<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::get();
        return view('seguridad.role.index', compact('roles'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $permission_in_role = $role->role_has_permissions;

        return view('seguridad.role.edit',compact('role','permissions','permission_in_role')  );
    }

    public function link_permission(Request $request)
    {
        $role = ModelsRole::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);
        $role->givePermissionTo($permission->name);
        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }

    public function unlink_permission(Request $request)
    {
        $role = ModelsRole::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);
        $role->revokePermissionTo($permission->name);
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
