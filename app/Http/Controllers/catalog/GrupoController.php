<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\MemberStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grupos = Grupo::get();
        $iglesia = Iglesia::get();

        return view('catalog.grupo.index', compact('grupos', 'iglesia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::get();
        $iglesia = Iglesia::get();
        return view('catalog.grupo.create', compact('grupos', 'iglesia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'ingresar nombre de grupo',
        ];

        $request->validate([

            'nombre' => 'required',

        ], $messages);
        $groups = new Grupo();
        $groups->nombre = $request->nombre;
        $groups->save();
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $grupos = Grupo::findOrFail($id);
        $grupo_iglesias =  $grupos->iglesiagrupo;
        $iglesiaArray =  $grupo_iglesias->pluck('id')->toArray();
        $grupos_noasignados = iglesia::whereNotIn('id', $iglesiaArray)->get();
        return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias', 'grupos_noasignados'));
        //return view('catalog.grupo.edit', compact('grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $groups = Grupo::findOrFail($id);
        $groups->nombre = $request->nombre;
        $groups->update();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = Grupo::findOrFail($id);
        $groups->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function reasigna_grupos($id)
    {
        $member_status = MemberStatus::get();

        $member = Member::findOrFail($id);

        $group = $member->user_has_group->first();

        $group_id = $group->group_id;


        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();

        $departamentos = Departamento::get();
        $iglesia = iglesia::findOrFail($member->organization_id);
        $grupos = Grupo::get();

        return view('catalog.grupo.reasigna_grupos', compact('member', 'departamentos', 'iglesia', 'member_status', 'group_church', 'grupos', 'group_id'));
    }


    public function attach_iglesiagrupo(Request $request)
    {


        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->attach($request->grupo_id);
        alert()->success('El registro ha sido agregada correctamente');
        return back();
    }



    public function dettach_iglesiagrupo(Request $request)
    {


        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->detach($request->grupo_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();
    }
}
