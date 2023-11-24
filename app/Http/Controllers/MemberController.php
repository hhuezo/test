<?php

namespace App\Http\Controllers;

use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Municipio;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $members = Member::where('status_id','=',1)->get();
        return view('member.index', compact('members'));
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

    public function register_member()
    {
        //  dd('aqui estoy');

        $departamentos = Departamento::get();
        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        $iglesias = Iglesia::get();
        $newmiembro = Grupo::get();
        $grupos = Grupo::get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        $generos = Gender::get();
        return view('catalog.member.register_member_leader', compact('departamentos', 'newmiembro', 'iglesias','departamentos','municipios','generos','grupos'));
        //return view('auth.register_member', compact('departamentos'));

    }

    public function  modal_register_member($id)
    {



        $iglesia = Iglesia::findorfail($id);
        $iglesia_grupo = $iglesia->iglesia_grupo;
        $departamentos = Departamento::get();
        //$group_per_chuch_plan= group_per_chuch_plan::get();
        //$newmiembro =grupo::where('departamento_id', '=', 1)->get();
        return view('catalog.member.modal_register_member', compact('iglesia', 'departamentos', 'iglesia_grupo'));
    }


    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        return view('catalog.member.edit', compact('member','departamentos','municipios'));
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
