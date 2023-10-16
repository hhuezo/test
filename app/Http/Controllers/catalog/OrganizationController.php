<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Country;
use App\Models\catalog\Organization;
use App\Models\catalog\OrganizationStatus;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::get();
        $estatuorg = OrganizationStatus::get();

        return view('catalog.organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$questions =Question::get();
        $estatuorg = OrganizationStatus::get();
   //     $countrys = Country::get();
        return view('catalog.organization.create', compact('estatuorg'));
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
            'name.required' => 'ingresar nombre de la organizacion',
        ];



        $request->validate([

            'name' => 'required',

        ], $messages);
        $organizations = new Organization();
        $organizations->name = $request->name;
        $organizations->address = $request->address;
        $organizations->country_id = $request->country_id;
        $organizations->state_id = $request->addstate_idress;
        $organizations->city_id = $request->city_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->secondary_contact_name = $request->secondary_contact_name;
        $organizations->secondary_contact_job_title = $request->secondary_contact_job_title;
        $organizations->secondary_contact_phone_number = $request->secondary_contact_phone_number;
        $organizations->secondary_contact_phone_number_2 = $request->secondary_contact_phone_number_2;
        $organizations->status = $request->status;
        $organizations->save();

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
        $organizations =  Organization::findOrFail($id);
        $estatuorg = OrganizationStatus::get();

        return view('catalog.organization.edit', compact('organizations', 'estatuorg'));
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
        $organizations = Organization::findOrFail($id);

        $organizations->name = $request->name;
        $organizations->address = $request->address;
        $organizations->country_id = $request->country_id;
        $organizations->state_id = $request->addstate_idress;
        $organizations->city_id = $request->city_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->secondary_contact_name = $request->secondary_contact_name;
        $organizations->secondary_contact_job_title = $request->secondary_contact_job_title;
        $organizations->secondary_contact_phone_number = $request->secondary_contact_phone_number;
        $organizations->secondary_contact_phone_number_2 = $request->secondary_contact_phone_number_2;
        $organizations->status = $request->status;

        $organizations->save();

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
        $organizations = Organization::findOrFail($id);
        //dd($question);
        $organizations->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
