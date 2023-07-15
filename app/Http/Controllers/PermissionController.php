<?php

namespace App\Http\Controllers;

use App\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::get();
        return view('seguridad.permission.index', compact('permissions'));
    }

   
    
    public function update_permission(Request $request)
    {
        $permission = ModelsPermission::findOrFail($request->id);
        $permission->name = $request->name;
        $permission->update();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->get('name')]);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $permission = ModelsPermission::findOrFail($id);
        $permission->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
