<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Region;
use App\Models\catalog\Sede;
use Illuminate\Http\Request;

class InformacionGeneralController extends Controller
{

    public function index()
    {
        $regiones = Region::get();
        return view('informacion_general.index', compact('regiones'));
    }


    public function get_cohortes($id)
    {
        $cohortes = Cohorte::where('region_id','=',$id)->get();
        return view('informacion_general.cohortes', compact('cohortes'));
    }

    public function get_sedes($id)
    {
        $cohorte = Cohorte::findOrFail($id);
        $sedes = Sede::where('cohorte_id','=',$id)->get();
        return view('informacion_general.sedes', compact('cohorte','sedes'));
    }


    public function get_iglesias($id)
    {
        $sede = Sede::findOrFail($id);
        $iglesias = Iglesia::where('sede_id','=',$id)->get();
        return view('informacion_general.iglesias', compact('sede','iglesias'));
    }

    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
