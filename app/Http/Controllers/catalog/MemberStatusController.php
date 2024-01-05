<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\MemberStatus;
use Illuminate\Http\Request;

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
        $MemberStatus =MemberStatus::get();


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
];



$request->validate([

    'description.required' => 'ingresar nombre',

], $messages);

$MemberStatus = new MemberStatus();
$MemberStatus->description = $request->description;
$MemberStatus->description_es = $request->description;
$MemberStatus->adding_date = $request->adding_date;
$MemberStatus->modifying_user = $request->modifying_user;
$MemberStatus->modifying_date = $request->modifying_date;
$MemberStatus->status = $request->status;
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
        $MemberStatus= MemberStatus::findOrFail($id);
        $MemberStatusall= MemberStatus::get();

        return view('catalog.member_status.edit', compact('MemberStatus','MemberStatusall'));
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
];



$request->validate([

    'description.required' => 'ingresar nombre',

], $messages);
$MemberStatus = MemberStatus::findOrFail($id);
$MemberStatus = new MemberStatus();
$MemberStatus->description = $request->description;
$MemberStatus->description_es = $request->description;
$MemberStatus->adding_date = $request->adding_date;
$MemberStatus->modifying_user = $request->modifying_user;
$MemberStatus->modifying_date = $request->modifying_date;
$MemberStatus->status = $request->status;
$MemberStatus->save();

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
        $MemberStatus= MemberStatus::findOrFail($id);
        //dd($question);
        $MemberStatus->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
