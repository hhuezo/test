<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\MemberStatus;
use App\Models\catalog\Municipio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $participantes = DB::table('member as m')
            ->select('m.id', DB::raw('CONCAT(m.name_member, " ", m.lastname_member) as nombre'), DB::raw('(SELECT i.name FROM users_has_iglesia uhi INNER JOIN iglesia i ON uhi.iglesia_id = i.id WHERE uhi.user_id = u.id LIMIT 1) as iglesia'))
            ->join('users as u', 'm.users_id', '=', 'u.id')
            ->get();
        return view('catalog.member.index', compact('participantes',));
    }


    public function create()
    {
        $member = Member::get();
        $member_status = MemberStatus::get();
        $groupperchuchplan = GroupPerchuchPlan::get();
        $departamentos = Departamento::get();
        $iglesia = Iglesia::where('status_id', '!=', 3)->get();
        $grupos = Grupo::get();
        $generos = Gender::get();
        $municipios = Municipio::get();


        return view('catalog.member.create', compact('generos', 'departamentos', 'iglesia', 'grupos', 'member_status', 'groupperchuchplan', 'municipios'));
    }

    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'last_name.required' => 'El apellido es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
            'document_number.required' => 'El número de documento es un valor requerido',
            'phone_number.required' => 'El número de telefono es un valor requerido',
            'phone_number.regex' => 'El número de teléfono no es válido',
            'address.required' => 'La dirección es un valor requerido',
            'document_number.required' => 'El número de documento es un valor requerido',
            'document_number.min' => 'El número de documento no es válido',
            'document_number.regex' => 'El número de documento no es válido',
            'birthdate.before' => 'El grupo seleccionado no es válido',
            'municipio_id.required' => 'El municipio es un valor requerido',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
            'address' => ['required', 'string', 'max:255'],
            'municipio_id' => ['required'],
        ], $messages);



        if ($request->grupo_id != 1) {
            $request->validate([
                'document_number' => ['required', 'string', 'regex:/^\d{8}-\d$/'],
            ], $messages);
        }



        $fechaNacimiento = Carbon::parse($request->birthdate);
        $edad = $fechaNacimiento->age;

        if ($edad >= 18  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido1']]);
        }


        if ($edad < 18  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido2']]);
        }

        if ($request->catalog_gender_id == 1 && $request->grupo_id == 2) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido3']]);
        }

        if ($request->catalog_gender_id == 2 && $request->grupo_id == 3) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido4']]);
        }


        $user = new User();
        $user->name = $request->name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();

        $user->assignRole('participante');

        //asign role
        $iglesia = Iglesia::findorfail($request->iglesia_id);

        $iglesia->users_has_iglesia()->attach($user->id);

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->catalog_gender_id;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->status_id = 1;
        $member->users_id = $user->id;
        $member->address = $request->address;
        $member->is_pastor = 0;

        $member->save();
        $member->member_has_group()->attach($request->group_id);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }


    public function show($id)
    {
        $iglesia = Iglesia::findorfail($id);
        $member = Member::get();
        $member_status = MemberStatus::get();
        $groupperchuchplan = GroupPerchuchPlan::get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        $generos = Gender::get();
        $grupos = Grupo::get();
        $iglesia_grupo = $iglesia->iglesia_has_grupo;

        return view('catalog.member.show', compact('iglesia_grupo', 'departamentos', 'iglesia', 'grupos', 'member_status', 'groupperchuchplan', 'municipios', 'generos'));
        alert()->success('El registro ha sido añadido correctamente');
        // return back();
    }

    public function register_member_leader()
    {
        $departamentos = Departamento::get();
        $iglesias = Iglesia::get();
        $grupos = Grupo::get();
        $generos = Gender::get();
        $departamentos = Departamento::get();
        $municipios = Municipio::get();
        return view('catalog.member.register_member_leader', compact('generos', 'departamentos', 'grupos', 'iglesias', 'departamentos', 'municipios'));
    }

    public function edit($id)
    {

        $iglesias = Iglesia::where('status_id', '<>', 3)->get();

        $member_status = MemberStatus::get();

        $member = member::findOrFail($id);

        $group = $member->member_has_group->first();

        if (($group) != null) {
            $member->group_id = $group->id;
        } else {
            $member->group_id = '';
        }

        $generos = Gender::get();
        $grupos = Grupo::get();
        $departamentos = Departamento::get();
        $municipios = Municipio::where('departamento_id','=',$member->departamento_id)->orderBy('nombre')->get();

        return view('catalog.member.edit', compact( 'iglesias','member', 'member_status', 'grupos',  'generos', 'departamentos', 'municipios'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name_member.required' => 'ingresar nombre',
        ];



        $request->validate([

            'name_member.required' => 'ingresar nombre miembro',

        ], $messages);


        $member =  Member::findOrFail($id);
        //borrando el grupo anterior
        $group = $member->member_has_group->first();
        $member->member_has_group()->detach($group);
        $iglesia = Iglesia::findOrFail($member->organization_id);
        $iglesia->users_has_iglesia->detach($member->users_id);

        $member->name_member = $request->name_member;
        $member->lastname_member = $request->lastname_member;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->document_type_id = $request->document_type_id;
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->cell_phone_number;
        //$group = $member->member_has_group->first();
        $group_id = $request->group_id;
        $member->address = $request->address;
        $member->update();
        //agregando nuevo grupo
        $member->member_has_group()->attach($group_id);
        $iglesia = Iglesia::findOrFail($request->organization_id);
        $iglesia->users_has_iglesia->attach($member->users_id);
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
