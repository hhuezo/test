<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\OrganizationStatus;
use Illuminate\Http\Request;

class OrganizationStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OrganizationStatus =OrganizationStatus::get();

        return view('catalog.organization_status.index', compact('OrganizationStatus'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalog.organization_status.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $messages = [
            'description.required' => 'ingresar descripcion del estado',

        ];



        $request->validate([

            'description' => 'required',


        ], $messages);
        $OrganizationStatus = new OrganizationStatus();
        $OrganizationStatus->description = $request->description;
        $OrganizationStatus->save();

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
        //
         $OrganizationStatus=  OrganizationStatus::findOrFail($id);

        return view('catalog.organization_status.edit', compact('OrganizationStatus'));
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
        $OrganizationStatus= OrganizationStatus::findOrFail($id);
        $OrganizationStatus->description = $request->description;
        $OrganizationStatus->save();

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
        //
        $question= OrganizationStatus::findOrFail($id);
        //dd($question);
        $question->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
