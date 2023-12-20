<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
//use App\Models\catalog\MemberHasGrupo;
use App\Models\catalog\MemberStatus;
use App\Models\catalog\Municipio;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

use Illuminate\Validation\ValidationException;

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
        $participantes =  DB::select("select  q.id id, q.name_member as nombre , q.lastname_member as apellido , i.name iglesia
        from iglesia i
        join member q
        join  users_has_iglesia r on        r.iglesia_id=i.id and r.user_id=q.users_id ");

        return view('catalog.member.index', compact('member', 'member_status', 'participantes'));
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

        // $groupperchuchplan = GroupPerchuchPlan::get();

        $departamentos = Departamento::get();
        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        $iglesias = Iglesia::where('status_id', '!=', 3)->get();
        $grupos = Grupo::get();
        $generos = Gender::get();
        $municipios = Municipio::get();

        return view('catalog.member.create', compact('generos', 'departamentos', 'iglesias', 'grupos', 'member_status',  'municipios'));
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
            'name.required' => 'El nombre es un valor requerido',
            'lastname_member.required' => 'El apellido es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
            'cell_phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido'

        ];



        $request->validate([
            'name_member' => ['required', 'string', 'max:255'],
            'lastname_member' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cell_phone_number' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],

        ], $messages);

        if ($request->grupo_id != 1) {
            $request->validate([
                'name_member' => ['required', 'string', 'max:255'],
                'lastname_member' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'cell_phone_number' => ['required', 'string', 'max:9'],
                'address' => ['required', 'string', 'max:255'],
                //  'phone_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
            ], $messages);
        }


        $fechaNacimientoObj = new DateTime($request->birthdate);
        $fechaActual = new DateTime();
        $edad = $fechaNacimientoObj->diff($fechaActual);
        $edad->y;

        /*agregado */
        if ($edad->y <= 17  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
        }


        if ($edad->y <= 17  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
        }




        if ($edad->y >= 18  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }


        if ($edad->y < 18  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }

        $user = new User();
        $user->name = $request->name_member . ' ' . $request->lastname_member;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();
        $user->assignRole('participante');

        //asign role
        $iglesia = Iglesia::findorfail($request->organization_id);

        $iglesia->users_has_iglesia()->attach($user->id);

        $deptos = Departamento::findorfail($iglesia->catalog_departamento_id);

        $member = new Member();
        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->catalog_gender_id;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->status_id = 1;
        $member->users_id = $user->id;
        // $member->departamento_id =   $deptos->id;
        $member->address = $request->address;
        //  if ($request->get('is_pastor') == 'on') {
        //    $member->is_pastor = 1;   // si es pastor
        //} else {
        $member->is_pastor = 0;
        // }
        $member->save();

        $member->member_has_group()->attach($request->group_id);


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
        // $iglesia = Iglesia::where('status_id', '!=', 3)->get();
        $member = Member::get();

        $member_status = MemberStatus::get();

        // $groupperchuchplan = GroupPerchuchPlan::get();

        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        //  //$organizations = Organization::get();
        $generos = Gender::get();
        $grupos = Grupo::get();
        $iglesia_grupo = $iglesia->iglesia_has_grupo;

        return view('catalog.member.show', compact('iglesia_grupo', 'departamentos', 'iglesia', 'grupos', 'member_status', 'groupperchuchplan', 'municipios', 'generos'));
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
        return view('catalog.member.register_member_leader', compact('generos', 'departamentos', 'grupos', 'iglesias', 'departamentos', 'municipios'));
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

        $grupo = $member->member_has_group->first();
        //dd($grupo);
        $usuario = User::findOrFail($member->users_id);

        $iglesia = $usuario->user_has_iglesia->first();

        $generos = Gender::get();
        $grupos = Grupo::get();
        // $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        $iglesias = Iglesia::where('status_id', '<>', 3)->get();

        return view('catalog.member.edit', compact('member', 'member_status', 'grupos', 'grupo',  'generos', 'departamentos', 'municipios', 'iglesia', 'iglesias'));
    }



    public function modificar_datos_participante()
    {

       // dd('llegue');
        $user = User::findOrFail(auth()->user()->id);

        $participante =$user->usuario_participante->first()->id;
       // dd($participante);

        $member_status = MemberStatus::get();

        $member = member::findOrFail($participante);

        $grupo = $member->member_has_group->first();
        //dd($grupo);
        $usuario = User::findOrFail($member->users_id);

        $iglesia = $usuario->user_has_iglesia->first();

        $generos = Gender::get();
        $grupos = Grupo::get();

        // $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        $iglesias = Iglesia::where('status_id', '<>', 3)->get();

        return view('catalog.member.modificar', compact('member', 'member_status', 'grupos', 'grupo',  'generos', 'departamentos', 'municipios', 'iglesia', 'iglesias'));
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
            'name.required' => 'El nombre es un valor requerido',
            'lastname_member.required' => 'El apellido es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            // 'email.unique' => 'El correo ingresado ya existe',
            'cell_phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido'

        ];



        $request->validate([
            'name_member' => ['required', 'string', 'max:255'],
            'lastname_member' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cell_phone_number' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],

        ], $messages);

        if ($request->grupo_id != 1) {
            $request->validate([
                'name_member' => ['required', 'string', 'max:255'],
                'lastname_member' => ['required', 'string', 'max:255'],
                //  'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                //'password' => ['required', 'string', 'min:8', 'confirmed'],
                'cell_phone_number' => ['required', 'string', 'max:9'],
                'address' => ['required', 'string', 'max:255'],
                //  'phone_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
            ], $messages);
        }


        $fechaNacimientoObj = new DateTime($request->birthdate);
        $fechaActual = new DateTime();
        $edad = $fechaNacimientoObj->diff($fechaActual);
        $edad->y;


        /*agregado */
        if ($edad->y <= 17  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
        }


        if ($edad->y <= 17  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
        }


        if ($edad->y >= 18  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }


        if ($edad->y < 18  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }




        $member =  Member::findOrFail($id);
        //borrando el grupo anterior
        $group = $member->member_has_group->first();
        $member->member_has_group()->detach($group);
        $user = User::findOrFail($member->users_id);
        /*agregado */
        if ($user->email != $request->email) {
            //buscar si existe el correo
            throw ValidationException::withMessages(['email' => ['El Correo ya existe ']]);
        }

        if ($request->password != '') {
            $user->password = Hash::make($request->password);
            $user->update();
        }

        // dd( $user);
        $iglesia = $user->user_has_iglesia->first();

        try {
            $user->user_has_iglesia()->detach($iglesia->id);
        } catch (Exception $e) {
        }


        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->document_type_id = $request->document_type_id;
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->catalog_gender_id = $request->catalog_gender_id;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        //$group = $member->member_has_group->first();
        $group_id = $request->group_id;
        $member->address = $request->address;
        $member->update();
        //agregando nuevo grupo
        $member->member_has_group()->attach($group_id);
        $iglesia = Iglesia::findOrFail($request->organization_id);


        try {
            $iglesia->users_has_iglesia()->attach($member->users_id);
        } catch (Exception $e) {
        }
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
        $member = Member::findOrFail($id);
        //dd($question);
        $member->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
