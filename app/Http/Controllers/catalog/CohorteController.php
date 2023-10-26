<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Region;
use Illuminate\Http\Request;

class CohorteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cohorte =Cohorte::get();

        return view('catalog.cohorte.index', compact('cohorte'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = Region::get();

        return view('catalog.cohorte.create', compact('region'));
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
            'nombre.required' => 'ingresar nombre la congregacion',
        ];

        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $cohorte = new Cohorte();
        $cohorte->nombre = $request->nombre;
        $cohorte->region_id = $request->region_id;
        $cohorte->save();
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
        $cohorte = Cohorte::findOrFail($id);
        $region=Region::get();

        return view('catalog.cohorte.edit', compact('cohorte','region'));
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
        $messages = [
            'nombre.required' => 'ingresar nombre de congregacion',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $cohorte= Cohorte::findOrFail($id);
        $cohorte->nombre = $request->nombre;
        $cohorte->region_id = $request->region_id;
        $cohorte->save();
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
        $cohorte= Cohorte::findOrFail($id);
        //dd($question);
        $cohorte->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
