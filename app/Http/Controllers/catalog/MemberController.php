<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\MemberHasGrupo;
use App\Models\catalog\MemberStatus;
use App\Models\catalog\Municipio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $member_status = MemberStatus::get();
        $miembros_iglesia =  DB::select("select  q.id id, q.name_member as nombre , q.lastname_member as apellido , i.name iglesia
        from iglesia i
        join member q on
        i.id =q.organization_id");

        return view('catalog.member.index', compact('member', 'member_status','miembros_iglesia'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::get();

        $member_status = MemberStatus::get();

        $groupperchuchplan = GroupPerchuchPlan::get();

        $departamentos = Departamento::get();
        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        $iglesia = Iglesia::where('status_id', '!=', 3)->get();
        $grupos = Grupo::get();
        $generos = Gender::get();
        $municipios = Municipio::get();


        return view('catalog.member.create', compact('generos','departamentos','iglesia','grupos', 'member_status', 'groupperchuchplan','municipios'));
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

        $user = new User();
        $user->name = $request->name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->assignRole('participante');

        $user->save();

        //asign role
        $iglesia = Iglesia::findorfail($request->iglesia_id);
        $deptos = Departamento::findorfail( $iglesia->catalog_departamento_id);

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->status_id = 1;
        $member->users_id = $user->id;
        $member->departamento_id=   $deptos->id;
        $member->address=$request->address;
        if($request->get('is_pastor') == 'on'){
            $member->is_pastor = 1;   // si es pastor
        }else{
            $member->is_pastor = 0;
        }
        $member->save();

        $member ->member_has_group()->attach($request->group_id);

       // $GroupPerchuchPlan = GroupPerchuchPlan::where('iglesia_id', '=', $request->iglesia_id)->where('group_id', '=', $request->grupo_id)->first();
        // dd( $GroupPerchuchPlan->id);
       // $GroupPerchuchPlan->miembro_grupo()->attach($member->id);
        //$grupoiglesia =iglesia::where('id', '=',(int)$request->iglesia_id)->get();
        //$grupoiglesia->iglesia_grupo()->attach($request->group_id);
        // alert()->success('El registro ha sido agregado correctamente');





        //Envio de correo usando metodo sendMail de MailController
        // $objeto = new  MailController();
        // $email = $request->email;
        //$email = $request->get('email');
        // $subject = "Notificación: Datos registrados correctamente";
        // $content = "Sus datos han sido registrados, nuestro equipo revisará la información y le notificará cuando sean aprobados";
        // $result = $objeto->sendMail($email, $subject, $content);


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

        $iglesia = Iglesia::findorfail($id);
        $member = Member::get();

        $member_status = MemberStatus::get();

        $groupperchuchplan = GroupPerchuchPlan::get();

        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        //  //$organizations = Organization::get();
        $generos = Gender::get();
        $grupos = Grupo::get();
        $iglesia_grupo = $iglesia->iglesia_has_grupo;

        return view('catalog.member.show', compact('iglesia_grupo','departamentos','iglesia','grupos', 'member_status', 'groupperchuchplan','municipios','generos'));
        alert()->success('El registro ha sido añadido correctamente');
       // return back();
    }

    public function register_member_leader()
    {
        //  dd('aqui estoy');

        $departamentos = Departamento::get();
        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        $iglesias = Iglesia::get();
        $grupos = Grupo::get();
        $generos = Gender::get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        return view('catalog.member.register_member_leader', compact('generos','departamentos', 'grupos', 'iglesias','departamentos','municipios'));
        //return view('auth.register_member', compact('departamentos'));

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

        $group = $member->member_has_group->first();
        if(($group) != null){
            $group_id = $group->group_id;
        }else{
            $group_id = '';
        }

        $genero=Gender::get();
        $grupos = Grupo::get();
        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();
        $departamentos=Departamento::get();
        $municipios=Municipio::get();
        $iglesia = Iglesia::get();
        return view('catalog.member.edit', compact('member', 'member_status', 'grupos', 'group_church', 'group_id','genero','departamentos','municipios','iglesia'));
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
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        $group = $member->member_has_group->first();
        $group_id = $group->group_id;
        $member->address=$request->address;
        $member ->member_has_group()->detach( $group_id);
        $member ->member_has_group()->attach($request->group_id);
        $member->update();
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
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
