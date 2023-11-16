<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Member;
use App\Models\catalog\MemberStatus;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
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
        $member = Member::get();
        $MemberStatus = MemberStatus::get();
        return view('catalog.member.index', compact('member', 'MemberStatus'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::get();

        $MemberStatus = MemberStatus::get();

        $groupperchuchplan = GroupPerchuchPlan::get();

        return view('catalog.member.create', compact('member', 'MemberStatus', 'groupperchuchplan'));
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
            'name_member.required' => 'ingresar nombre',
        ];



        $request->validate([

            'name_member.required' => 'ingresar nombre miembro',

        ], $messages);

        $member = new Member();
        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        $member->birthdate = $request->birthdate;
        $member->document_number_type = $request->document_number_type;
        $member->document_type_id = $request->document_type_id;
        $member->save();

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


        $member_status = MemberStatus::get();

        $member = member::findOrFail($id);

        $group = $member->user_has_group->first();

        $group_id = $group->group_id;

        $grupos = Grupo::get();
        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();

        return view('catalog.member.edit', compact('member', 'member_status', 'grupos', 'group_church', 'group_id'));
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
            'name_member.required' => 'ingresar nombre',
        ];



        $request->validate([

            'name_member.required' => 'ingresar nombre miembro',

        ], $messages);


        $member =  Member::findOrFail($id);
        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        $member->birthdate = $request->birthdate;
        $member->document_number_type = $request->document_number_type;
        $member->document_type_id = $request->document_type_id;
        $member->Update();
        $group = $member->user_has_group->first();
        $group_id = $group->group_id;
     //  dd( $member->organization_id);
        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->where('group_id', '=',  $group_id)->first();
      //  dd(  $group_church);
        $group_church->group_id = $request->grupo_id;
        $group_church->update();
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
        $member = Member::findOrFail($id);
        //dd($question);
        $member->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
