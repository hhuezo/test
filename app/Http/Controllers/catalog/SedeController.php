<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sede=Sede::get();
        $cohorte =Cohorte::get();

        return view('catalog.sede.index', compact('sede','cohorte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede=Sede::get();
        $cohorte =Cohorte::get();

        return view('catalog.sede.create', compact('sede','cohorte'));
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
            'nombre.required' => 'ingresar nombre la sede de  congregacion',
        ];

        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $sede = new sede();
        $sede->nombre = $request->nombre;
        $sede->cohorte_id = $request->cohorte_id;
        $sede->save();
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
        $sede = Sede::findOrFail($id);
        $cohorte =Cohorte::get();
        return view('catalog.sede.edit', compact('sede','cohorte'));
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
            'nombre.required' => 'ingresar nombre de sede de la congregacion',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $sede=  sede::findOrFail($id);
        $sede->nombre = $request->nombre;
        $sede->cohorte_id = $request->cohorte_id;
        $sede->update();
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
        $sede= sede::findOrFail($id);
        //dd($question);
        $sede->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
