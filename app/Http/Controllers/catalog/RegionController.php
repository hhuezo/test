<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region =Region::get();

        return view('catalog.region.index', compact('region'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.region.create');
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
            'nombre.required' => 'ingresar la pregunta',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $region = new region();
        $region->nombre = $request->nombre;
        $region->save();
        alert()->success('El registro ha sido agregado correctamente');
        return redirect('catalog/region');

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
        $region = Region::findOrFail($id);

        return view('catalog.region.edit', compact('region'));
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
            'nombre.required' => 'ingresar nombre de region',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $region= Region::findOrFail($id);
        $region->nombre = $request->nombre;
        $region->save();
        alert()->success('El registro ha sido Modificado correctamente');
        return redirect('catalog/region');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region= Region::findOrFail($id);
        //dd($question);
        $region->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return redirect('catalog/region');

    }
}
