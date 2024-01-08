<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\MemberStatus;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberStatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $MemberStatus = MemberStatus::get();


        return view('catalog.member_status.index', compact('MemberStatus'));
    }

    public function create()
    {
        $MemberStatus = MemberStatus::get();

        return view('catalog.member_status.create', compact('MemberStatus'));
    }

    public function store(Request $request)
    {

        $messages = [
            'description.required' => 'El nombre de estado es requerido',
            'status_id.required' => 'El estado es requerido',
        ];

        $request->validate([
            'description' => 'required',
            'status_id' => 'required',
        ], $messages);


        $MemberStatus = new MemberStatus();
        $MemberStatus->description = $request->description;
        $MemberStatus->description_es = $request->description;

        $time = Carbon::now('America/El_Salvador');
        $MemberStatus->adding_date = $time->toDateTimeString();
        $MemberStatus->modifying_user = auth()->user()->id;
        $MemberStatus->modifying_date = $time->toDateTimeString();
        $MemberStatus->status = $request->status_id;
        $MemberStatus->save();

        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $MemberStatus = MemberStatus::findOrFail($id);
        return view('catalog.member_status.edit', compact('MemberStatus'));
    }


    public function update(Request $request, $id)
    {
        $messages = [
            'description.required' => 'El nombre de estado es requerido',
            'status_id.required' => 'El estado es requerido',
        ];

        $request->validate([
            'description' => 'required',
            'status_id' => 'required',
        ], $messages);

        $time = Carbon::now('America/El_Salvador');
        $MemberStatus = MemberStatus::findOrFail($id);
        $MemberStatus->description = $request->description;
        $MemberStatus->description_es = $request->description;
        $MemberStatus->modifying_user = auth()->user()->id;
        $MemberStatus->modifying_date = $time->toDateTimeString();
        $MemberStatus->status = $request->status_id;
        $MemberStatus->update();
        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }


    public function destroy($id)
    {
        $MemberStatus = MemberStatus::findOrFail($id);
        //dd($question);
        $MemberStatus->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
