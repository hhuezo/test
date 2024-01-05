<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\ReglasGenerales;
use Illuminate\Http\Request;

class ReglasGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ReglasGenerales=ReglasGenerales::get();
        return view('administracion.reglas_generales.index',compact('ReglasGenerales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ReglasGenerales=ReglasGenerales::get();
        return view('administracion.reglas_generales.create',compact('ReglasGenerales'));
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
            'rule_name.required' => 'ingresar nombre',
            'abbrev' => 'ingresar abreviatura',

        ];



        $request->validate([

            'rule_name' => 'required',
            'abbrev' => 'required',

        ], $messages);

        $ReglasGenerales = new ReglasGenerales();
        $ReglasGenerales->rule_name = $request->rule_name;
        $ReglasGenerales->abbrev = $request->abbrev;
        $ReglasGenerales->quantity = $request->quantity;
        $ReglasGenerales->save();
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
        $ReglasGenerales=ReglasGenerales::findOrFail($id);
        return view('administracion.reglas_generales.edit', compact('ReglasGenerales'));
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
            'rule_name.required' => 'ingresar nombre',
            'abbrev' => 'ingresar abreviatura',
        ];


        $request->validate([

            'rule_name' => 'required',
            'abbrev' => 'required',

        ], $messages);

        $ReglasGenerales = ReglasGenerales::findOrFail($id);
        $ReglasGenerales->rule_name = $request->rule_name;
        $ReglasGenerales->abbrev = $request->abbrev;
        $ReglasGenerales->quantity = $request->quantity;
        $ReglasGenerales->update();
        alert()->success('El registro ha sido agregado correctamente');
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
        $ReglasGenerales=ReglasGenerales::findOrFail($id);
        $ReglasGenerales->delete();
        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }
}
