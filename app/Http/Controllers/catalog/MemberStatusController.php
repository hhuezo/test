<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\MemberStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberStatusController extends Controller
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
        $MemberStatus = MemberStatus::get();


        return view('catalog.member_status.index', compact('MemberStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MemberStatus = MemberStatus::get();

        return view('catalog.member_status.create', compact('MemberStatus'));
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
            'description.required' => 'ingresar nombre',
            'status.required' => 'ingresar letra identificadora',
        ];



        $request->validate([

            'description.required' => 'ingresar nombre',
            'status.required' => 'ingresar letra identificadora',

        ], $messages);

        $MemberStatus = new MemberStatus();
        $MemberStatus->description = $request->description;
        $MemberStatus->description_es = $request->description;

        $time = Carbon::now('America/El_Salvador');
        $MemberStatus->adding_date = $time->toDateTimeString();
        $MemberStatus->modifying_user = $time->toDateTimeString();
        $MemberStatus->modifying_date = $time->toDateTimeString();
        $MemberStatus->status = $request->status_id;
        $MemberStatus->save();

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
        $MemberStatus = MemberStatus::findOrFail($id);
        $MemberStatusall = MemberStatus::get();

        return view('catalog.member_status.edit', compact('MemberStatus', 'MemberStatusall'));
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
            'description.required' => 'ingresar nombre',
            'status.required' => 'Seleccionar Estado',

        ];



        $request->validate([

            'description.required' => 'ingresar nombre',
            'status.required' => 'Seleccionar Estado',


        ], $messages);
        $time = Carbon::now('America/El_Salvador');
        $MemberStatus = MemberStatus::findOrFail($id);
        $MemberStatus->description = $request->description;
        $MemberStatus->description_es = $request->description;
        $MemberStatus->adding_date = $time->toDateTimeString();
        $MemberStatus->modifying_user = $time->toDateTimeString();
        $MemberStatus->modifying_date = $time->toDateTimeString();
        $MemberStatus->status = $request->status_id;
        $MemberStatus->update();
        alert()->success('El registro ha sido modificado correctamente');
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
        $MemberStatus = MemberStatus::findOrFail($id);
        //dd($question);
        $MemberStatus->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
