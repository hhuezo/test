<?php

namespace App\Http\Controllers;

use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\MemberHasGrupo;
use App\Models\catalog\Municipio;
use App\Models\catalog\UserHasGrupo;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberControllers extends Controller
{

    public function index()
    {
        //$members = Member::where('status_id','=',1)->get();        return view('members.index', compact('members'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }



    public function  modal_register_member($id)
    {



      ///  $iglesia = Iglesia::findorfail($id);
      //  $iglesia_grupo = $iglesia->iglesia_grupo;
      //  $departamentos = Departamento::get();
        //$group_per_chuch_plan= group_per_chuch_plan::get();
        //$newmiembro =grupo::where('departamento_id', '=', 1)->get();
        //return view('catalog.member.modal_register_member', compact('iglesia', 'departamentos', 'iglesia_grupo'));
    }


    public function edit($id)
    {
      //  $member = Member::findOrFail($id);
     //   $departamentos = Departamento::get();
    //    $municipios = Municipio::get();
    //    return view('catalog.member.edit', compact('member','departamentos','municipios'));
    }

    public function update_member_group(Request $request, $id)
    {

        // dd($request->member_id);
        $messages = [
            'name_member.required' => 'ingresar nombre',
        ];



        $request->validate([

            'name_member.required' => 'ingresar nombre miembro',

        ], $messages);


        $member =  Member::findOrFail($request->member_id);

        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        // $member->birthdate = $request->birthdate;
        $member->document_number_type = $request->document_number_type;
        //  $member->document_type_id = $request->document_type_id;
        $member->Update();
        // $group = $member->user_has_group->first();
        $group_id = $member->user_has_group->first(); //$group->group_id;

        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->where('group_id', '=',  $group_id->group_id)->first();

        $user_has_grupo = MemberHasGrupo::where('member_id', '=', $member->id)->where('grupo_id', '=', $group_id->id)->first();

        $group_churchnew = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->where('group_id', '=', $request->grupo_id)->first();

        $user_has_grupo->group_per_church_id =  $group_churchnew->id;
        $user_has_grupo->update();

        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }
    public function update(Request $request, $id)
    {

    }


    public function activate(Request $request)
    {

        $member = Member::findOrFail($request->id);
        $member->status_id = 2;
        $member->save();

        $user = User::findOrFail($member->users_id);
        $user->status = 1;
        $user->save();

        $objeto = new  MailController();
        $email = $user->email;
        $subject = "Notificación: Usuario aceptado";
        $content = "Se le informa que su usuario ha sido activado, por tanto ya puede ingresar a la platafoma";
        $result = $objeto->sendMail($email, $subject, $content);

        alert()->success('Miembro activado correctamente');
        return redirect('member');
    }


    public function decline(Request $request)
    {
        $member = Member::findOrFail($request->id);
        $member->status_id = 3;
        $member->save();



        $objeto = new  MailController();
        $email = $member->email;
        $subject = "Notificación: Usuario rechazado";
        $content = "Se le informa que su usuario ha sido rechazado, por tanto no podrá ingresar a la platafoma";
        $result = $objeto->sendMail($email, $subject, $content);

        alert()->info('Miembro rechazado correctamente');
        return redirect('organization');
    }


    public function destroy($id)
    {
        //
    }
}
