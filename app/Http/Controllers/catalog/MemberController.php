<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Imports\ParticipantesImport;
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
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = "";
        if($request->search)
        {
            $search = $request->search;
        }
        if (auth()->user()->hasRole('administrador')) {
            $iglesias = Iglesia::where('status_id', '<>', 3)->get();
            $participantes = Iglesia::join('users_has_iglesia as r', 'r.iglesia_id', '=', 'iglesia.id')
            ->join('member as m', 'm.users_id', '=', 'r.user_id')
            ->select(
                'm.id as id',
                'm.name_member as nombre',
                'm.lastname_member as apellido',
                'iglesia.name as iglesia',
                'm.document_number'
            )->where('m.name_member', 'like', '%' . $search . '%')->orWhere('m.lastname_member', 'like', '%' . $search . '%')
            ->orWhere('m.document_number', 'like', '%' . $search . '%')  ->paginate(10);
        } else {
            $user = User::findOrFail(auth()->user()->id);
            $iglesias = $user->user_has_iglesia;
            $iglesias_array = $iglesias->pluck('id')->toArray();

            $participantes = Iglesia::join('users_has_iglesia as r', 'r.iglesia_id', '=', 'iglesia.id')
            ->join('member as m', 'm.users_id', '=', 'r.user_id')
            ->select(
                'm.id as id',
                'm.name_member as nombre',
                'm.lastname_member as apellido',
                'iglesia.name as iglesia',
                'm.document_number'
            )->where('m.name_member', 'like', '%' . $search . '%')->orWhere('m.lastname_member', 'like', '%' . $search . '%')
            ->orWhere('m.document_number', 'like', '%' . $search . '%')  ->paginate(10);
        }

        return view('catalog.member.index', compact(  'participantes', 'iglesias','search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function importar_excel(Request $request)
    {
        $imports = Excel::toArray(new ParticipantesImport, $request->file('fileExcel'));
        foreach ($imports as $import) {
            unset($import[0]);  //descartar los encabezados
            unset($import[1]);
            $asistencia = array_values($import);
        }
        $iglesia = $request->iglesia;
        $noparticipantes = array();
        $agregados = array();
        $no_agregados = array();
        $add = '';
        $no_add = '';
        foreach ($asistencia as $obj) {
            //  dd($obj);
            //   dd(self::convertDate($obj[4]));
            if (isset($obj[1])) {   //es mayor de edad
                //validacion de correo
                if (isset($obj[3])) {
                    $email_existe = Member::where('email', '=', $obj[3])->first();
                    if ($email_existe) {
                        // dd('correo ya existo');
                        $nota = 'El email ya existe';
                        $no_add = $this->no_agregar($obj, $nota);
                    } else {
                        $add = $this->agregar_participante($obj, $iglesia);
                        // dd('agregar participante');
                    }
                    // validacion de dui
                } elseif (strlen($obj[1]) == 10 && is_numeric(str_replace('-', '', $obj[1])) == true) {
                    $dui_existe = Member::where('document_number', '=', $obj[1])->first();
                    if ($dui_existe) {
                        //dd('el dui ya existe');
                        $nota = 'El dui ya existe';
                        $no_add = $this->no_agregar($obj, $nota);
                        //  $this->no_agregar($obj);
                    } else {
                        $add = $this->agregar_participante($obj, $iglesia);
                        //dd('agregar participante');
                    }
                    //validacion telefono
                } elseif (strlen($obj[2]) == 9 && is_numeric(str_replace('-', '', $obj[2])) == true) {
                    $telefono_existe = Member::where('cell_phone_number', '=', $obj[1])->first();
                    if ($telefono_existe) {
                        $nota = 'El telefono ya existe';
                        $no_add = $this->no_agregar($obj, $nota);
                    } else {
                        $add = $this->agregar_participante($obj, $iglesia);
                        //dd('agregar participante');
                    }
                } else {
                    //  dd('datos nos valido, no se agrego');
                    $nota = 'Tiene datos erroneos';
                    $no_add = $this->no_agregar($obj, $nota);
                }
            } else {  //joven
                if (isset($obj[3])) {
                    $email_existe = Member::where('email', '=', $obj[3])->first();
                    if ($email_existe) {
                        $nota = 'El email ya existe';
                        $no_add = $this->no_agregar($obj, $nota);
                    } else {
                        $add = $this->agregar_participante($obj, $iglesia);
                        // dd('agregar participante');
                    }
                    // validacion de telefono
                } elseif (strlen($obj[2]) == 9 && is_numeric(str_replace('-', '', $obj[2])) == true) {
                    $telefono_existe = Member::where('cell_phone_number', '=', $obj[1])->first();
                    if ($telefono_existe) {
                        $nota = 'El telefono ya existe';
                        $no_add = $this->no_agregar($obj, $nota);
                    } else {
                        $add = $this->agregar_participante($obj, $iglesia);
                        //dd('agregar participante');
                    }
                } else {
                    $nota = 'Tiene datos erroneos';
                    $no_add = $this->no_agregar($obj, $nota);
                }
            }
            array_push($agregados, $add);
            array_push($no_agregados, $no_add);
        }

        //  dd($agregados,$no_agregados);
        return view('catalog.member.importar', compact('agregados', 'no_agregados'));
    }

    public function agregar_participante($participante, $iglesia)
    {
        //  dd($participante);

        $user = new User();
        $user->name = $participante[0];
        $user->email = $participante[3];
        $user->password = Hash::make('12345678');
        $user->assignRole("participante");
        $user->save();

        $user->user_has_iglesia()->attach($iglesia);
        $cadena = $participante[0];
        // Dividir la cadena en palabras
        $palabras = explode(' ', $cadena);

        // Tomar las dos primeras palabras
        $nombre = implode(' ', array_slice($palabras, 0, 2));
        $apellido = implode(' ', array_slice($palabras, 2, 4));

        // dd($nombre, $apellido);
        $member = new Member();
        $member->name_member = $nombre;
        $member->lastname_member = $apellido;
        $member->birthdate = self::convertDate($participante[4]);
        $member->document_number = $participante[1];
        if ($participante[5] == 'F') {
            $member->catalog_gender_id = 1;
        } else {
            $member->catalog_gender_id = 2;
        }
        $member->email = $participante[3];
        $member->cell_phone_number = $participante[2];
        $member->organization_id = $iglesia;
        $member->users_id = $user->id;
        $member->is_pastor = 0;
        $member->save();

        //grupos
        $fechaNacimiento = Carbon::parse($member->birthdate);
        $edad = $fechaNacimiento->age;
        if (!isset($participante[1]) && $edad >= 18) {
            $member->member_has_group()->attach(1);  //jovenes
        } elseif ($participante[6] == 'Si') {
            $member->member_has_group()->attach(4);   //lider
        } elseif ($participante[5] == 'F') {
            $member->member_has_group()->attach(3); //mujer
        } else {
            $member->member_has_group()->attach(2);  //hombre
        }
        $nota = "Agregado existosamente";
        $agregar = array();
        array_push($agregar, $participante[0]);
        array_push($agregar, $participante[1]);
        array_push($agregar, $participante[2]);
        array_push($agregar, $participante[3]);
        array_push($agregar, $nota);
        return $agregar;
    }

    public function convertDate($dateValue)
    { //función para convertir fechas  excel a fechas unix(que reconoce php)

        $unixDate = ($dateValue - 25569) * 86400;
        return $unixDate = gmdate("Y-m-d", $unixDate);
    }

    public function no_agregar($participante, $nota)
    {
        $no_agregar = array();

        array_push($no_agregar, $participante[0]);
        array_push($no_agregar, $participante[1]);
        array_push($no_agregar, $participante[2]);
        array_push($no_agregar, $participante[3]);
        array_push($no_agregar, $nota);
        return $no_agregar;
    }

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
             if ($edad->y <=0   &&  $request->grupo_id == 1) {
                throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
            }


            if ($edad->y <=0  &&  $request->grupo_id != 1) {
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
        $user->save();
        $user->assignRole('participante');

        //asign role
        $iglesia = Iglesia::findorfail($request->organization_id);

        $iglesia->users_has_iglesia()->attach($user->id);

        $deptos = Departamento::findorfail($iglesia->catalog_departamento_id);
        $member_existe = Member::where('document_number', '=', $request->document_number)->orWhere('cell_phone_number','=',$request->cell_phone_number)->first();
        if ($member_existe) {
            alert()->error('Error de ingreso de participante');
        } else {
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
            $member->address = $request->address;
            $member->is_pastor = 0;
            $member->save();


            $member->member_has_group()->attach($request->group_id);
            alert()->success('El registro ha sido agregado correctamente');
        }

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
       // dd($grupo);
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

        $participante = $user->usuario_participante->first()->id;
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
             if ($edad->y <=0  &&  $request->grupo_id == "1") {
                throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
            }


            if ($edad->y <=0  &&  $request->grupo_id <>  "1") {
                throw ValidationException::withMessages(['grupo_id' => ['La edad no es Coherente con el participante']]);
            }


        if ($edad->y >= 18  &&  $request->grupo_id == "1") {

            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }


        if ($edad->y < 18  &&  $request->grupo_id <> "1") {

            //dd($edad->y ,$request->grupo_id);//
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }




        $member =  Member::findOrFail($id);


        if ($member->document_number != $request->document_number) {
            $member_existe = Member::where('document_number', '=', $request->document_number)->where('id', '<>', $member->id)->first();
            if ($member_existe) {
                alert()->error('El registro no ha sido modificado');
            } else {




               // $member->attach_grupoactualizado($request);

                //borrando el grupo anterior
                $group = $member->member_has_group->first();
                $member->member_has_group()->detach($group);
                $group_id = $request->grupo_id;
                $member->member_has_group()->attach($group_id);
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
                $group_id = $request->grupo_id;
                $member->address = $request->address;
                $member->update();
                //agregando nuevo grupo
               // $member->member_has_group()->attach($group_id);
               $group_id = $request->grupo_id;
               $member->member_has_group()->attach($group_id);
                $iglesia = Iglesia::findOrFail($request->organization_id);


                try {
                    $iglesia->users_has_iglesia()->attach($member->users_id);
                } catch (Exception $e) {
                }
                alert()->success('El registro ha sido modificado correctamente');
            }
        } elseif($member->cell_phone_number != $request->cell_phone_number){
            $member_existe = Member::where('cell_phone_number', '=', $request->cell_phone_number)->where('id', '<>', $member->id)->first();
            if ($member_existe) {
                alert()->error('El registro no ha sido modificado');
            } else {

                $group_id = $request->grupo_id;
                $member->member_has_group()->attach($group_id);
                //borrando el grupo anterior
                $group = $member->member_has_group->first();
               // $member->member_has_group()->detach($group);
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
                $group_id =$request->grupo_id;
                $member->address = $request->address;
                $member->update();
                //agregando nuevo grupo
             //   $member->member_has_group()->attach($group_id);
                $iglesia = Iglesia::findOrFail($request->organization_id);


                try {
                    $iglesia->users_has_iglesia()->attach($member->users_id);
                } catch (Exception $e) {
                }
                alert()->success('El registro ha sido modificado correctamente');
            }
        }else {
            //borrando el grupo anterior
            $group = $member->member_has_group->first();
           // $member->member_has_group()->detach($group);
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
            $group = $member->member_has_group->first();
            $member->member_has_group()->detach($group);
            $group_id = $request->grupo_id;
            $member->member_has_group()->attach($group_id);
            alert()->success('El registro ha sido modificado correctamente');
        }

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

    public function attach_grupoactualizado(Request $request)
    {


        $member_group = member::findOrFail($request->member_id);
        $member_group->member_has_group()->attach($request->grupo_id);
       // alert()->success('El registro ha sido agregada correctamente');
       // return back();
    }

}
