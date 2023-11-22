<?php

namespace App\Http\Controllers;

use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member; //as CatalogMember;
use App\Models\catalog\MemberStatus;
use App\Models\catalog\Municipio;
use App\Models\catalog\OrganizationStatus;
//use App\Models\Member;
use App\Models\catalog\Sede;
use App\Models\catalog\user_has_grupo;
use App\Models\catalog\UserHasGrupo;
use App\Models\catalog\WizardQuestions;
use App\Models\Organization;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Users;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //   $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.login');
        // return view('welcome');
    }


    public function  reporte_grupos($id_grupo_iglesia)
    {


        $grupos_iglesia =  GroupPerchuchPlan::findorfail($id_grupo_iglesia);

        $usuarios = Users::get();
        $grupo = Grupo::get();


        $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member,p.id as member_id
                from iglesia i
                join group_per_chuch_plan gpc
                on gpc.iglesia_id = i.id
                join grupo g on
                g.id = gpc.group_id
                join member p on
                p.organization_id=i.id
                join user_has_group q on
                p.id=q.member_id
                and q.group_per_church_id=gpc.id
                where  gpc.id=?";

        $miembros = DB::select($sql, array($grupos_iglesia->id));

        $iglesia = Iglesia::findorfail($grupos_iglesia->iglesia_id);
        $member_status = MemberStatus::get();




        $pdf = \Pdf::loadView('auth.reporte_grupos', compact('miembros', 'iglesia', 'usuarios', 'grupo', 'member_status'));
        return $pdf->stream('Info.pdf');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function reasigna_grupos($id)
    {
        $member_status = MemberStatus::get();

        $member = member::findOrFail($id);

        $group = $member->user_has_group->first();

        $group_id = $group->group_id;


        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();

        $departamentos = Departamento::get();
        $iglesia = iglesia::findOrFail($member->organization_id);
        $grupos = Grupo::get();

        return view('auth.reasigna_grupos', compact('member', 'departamentos', 'iglesia', 'member_status', 'group_church', 'grupos', 'group_id'));
    }



    public function consulta_grupos($id_grupo_iglesia)
    {


        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        // $iglesia = Iglesia::where('id', '=', $id_iglesia)->get();
        $grupos_iglesia =  GroupPerchuchPlan::findorfail($id_grupo_iglesia);
        //dd($iglesia,$i);

        //  $miembros = Member::where('organization_id', '=', $id_iglesia)->get();
        //dd($miembros->iglesia_grupo->nombre);
        $usuarios = Users::get();
        $grupo = Grupo::get();

        // $miembros = DB::table('member as a')
        // ->join('user_has_group as b', 'b.member_id', '=', 'a.id')
        //->join('group_per_chuch_plan as c', function ($join) {
        //    $join->on('c.iglesia_id', '=', 'a.organization_id')
        //->on('c.id', '=', 'b.group_per_church_id')
        //->on('a.organization_id =? ');
        //})        ->join('grupo as d', 'c.group_id', '=', 'd.id')        ->select('a.id','a.name_member', 'a.lastname_member', 'd.nombre')        ->get();


        $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member,p.id as member_id
        from iglesia i
        join group_per_chuch_plan gpc
        on gpc.iglesia_id = i.id
        join grupo g on
        g.id = gpc.group_id
        join member p on
        p.organization_id=i.id
        join user_has_group q on
        p.id=q.member_id
        and q.group_per_church_id=gpc.id
        where  gpc.id=?";

        $miembros = DB::select($sql, array($grupos_iglesia->id));

        $iglesia = Iglesia::findorfail($grupos_iglesia->iglesia_id);
        $member_status = MemberStatus::get();



        return view('auth.consulta_grupos', compact('miembros', 'iglesia', 'usuarios', 'grupo', 'member_status'));
        //return view('auth.register_member', compact('departamentos'));

    }
    public function register_member()
    {
        //  dd('aqui estoy');

        $departamentos = Departamento::get();
        //$municipios = Municipio::where('departamento_id', '=', 1)->get();
        //  //$organizations = Organization::get();
        $iglesias = Iglesia::get();
        $newmiembro = Grupo::get();
        return view('auth.register_member', compact('departamentos', 'newmiembro', 'iglesias'));
        //return view('auth.register_member', compact('departamentos'));

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
        return view('auth.register_member_leader', compact('generos','departamentos', 'grupos', 'iglesias'));
        //return view('auth.register_member', compact('departamentos'));

    }





    public function store_member(Request $request)
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
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido',
            //'organization_id.required' => 'La organización es requerida',
            'cargo_contacto_principal.required' => 'El cargo del contacto principal es un valor requerido',
            'contact_phone_number.required' => 'El número de telefono del contacto es un valor requerido',
            'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
        ];



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'document_number' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],
            //'organization_id' => ['required'],
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
        $deptos = Departamento::findorfail($iglesia->catalog_departamento_id);

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->status = 1;
        $member->users_id = $user->id;
        $member->state_id =   $deptos->id;
        //   $user->assignRole('Participante');
        // $member->municipio_id = $user->Municipio;
        $member->save();


        $GroupPerchuchPlan = GroupPerchuchPlan::where('iglesia_id', '=', $request->iglesia_id)->where('group_id', '=', $request->grupo_id)->first();
        // dd( $GroupPerchuchPlan->id);
        $GroupPerchuchPlan->miembro_grupo()->attach($member->id);
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
        alert()->success('Miembro registrado correctamente');
        return redirect('/login');
    }

    public function get_municipio($id)
    {
        return  Municipio::where('departamento_id', '=', $id)->get();
    }

    public function get_departamento($id)
    {
        $iglesia = Iglesia::findorfail($id);
        $departamento = Departamento::findorfail($iglesia->catalog_departamento_id);
        //dd($departamento->nombre);
        return $departamento;
    }

    public function get_map($dep)
    {
        return view('map', compact('dep'));
    }

    public function get_dep($id)
    {
        $dep = Departamento::where('abbrev', '=', $id)->first();

        if ($dep) {
            // Si encontramos un departamento, devolvemos la respuesta en formato JSON
            return response()->json($dep);
        } else {
            // Si no se encuentra el departamento, puedes devolver un mensaje o lo que sea necesario
            return response()->json(['error' => 'Departamento no encontrado'], 404);
        }
        // Si también necesitas la vista, puedes descomentar la línea siguiente
        // return view('map', compact('dep'));
    }


    public function edit($id)
    {
    }


    public function get_grupo($fecha)
    {
        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $fecha);
        $hoy = Carbon::now();

        if ($fechaNacimiento->diffInYears($hoy) > 18) {
            // La persona tiene más de 18 años
            $grupos = Grupo::where('id', '>', 1)->get();
        } else {
            // La persona tiene 18 años o menos
            $grupos = Grupo::where('id', '=', 1)->get();
        }
        return $grupos;
    }

    public function show($id)
    {
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

        $user_has_grupo = UserHasGrupo::where('member_id', '=', $member->id)->where('group_per_church_id', '=', $group_church->id)->first();

        $group_churchnew = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->where('group_id', '=', $request->grupo_id)->first();

        $user_has_grupo->group_per_church_id =  $group_churchnew->id;
        $user_has_grupo->update();

        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        //
    }



    public function  modal_register_member($id)
    {



        $iglesia = Iglesia::findorfail($id);
        $iglesia_grupo = $iglesia->iglesia_grupo;
        $departamentos = Departamento::get();
        //$group_per_chuch_plan= group_per_chuch_plan::get();
        //$newmiembro =grupo::where('departamento_id', '=', 1)->get();
        return view('auth.modal_register_member', compact('iglesia', 'departamentos', 'iglesia_grupo'));
    }



    public function attach_new_member(Request $request)
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
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido',
            //'organization_id.required' => 'La organización es requerida',
            'cargo_contacto_principal.required' => 'El cargo del contacto principal es un valor requerido',
            'contact_phone_number.required' => 'El número de telefono del contacto es un valor requerido',
            'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
        ];



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'document_number' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],
            //'organization_id' => ['required'],
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
        $deptos = Departamento::findorfail($iglesia->catalog_departamento_id);

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        //$member->document_number = $request->document_number;
        $member->email = $request->email;
        $member->cell_phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->status = 1;
        $member->users_id = $user->id;
        $member->state_id =   $deptos->id;
        //   $user->assignRole('Participante');
        // $member->municipio_id = $user->Municipio;
        $member->save();

        $GroupPerchuchPlan = GroupPerchuchPlan::where('iglesia_id', '=', $request->iglesia_id)->where('group_id', '=', $request->grupo_id)->first();

        $GroupPerchuchPlan->miembro_grupo()->attach($member->id);

        alert()->success('Miembro registrado correctamente');
        return back();
        //return redirect('/login');

    }



    public function registro_participantes($id_iglesia)
    {

        $iglesia = Iglesia::findorfail($id_iglesia);
        $iglesia_grupo = $iglesia->iglesia_grupo;
        $departamentos = Departamento::get();
        //$group_per_chuch_plan= group_per_chuch_plan::get();
        //$newmiembro =grupo::where('departamento_id', '=', 1)->get();
        return view('auth.register_member', compact('iglesia', 'departamentos', 'iglesia_grupo'));

        //


    }





    public function datos_iglesia(Request $request)
    {
        $i = 1;
        $user   = User::findOrFail(auth()->user()->id);
        $iglesia = $user->iglesia->first();
        $departamentos = Departamento::get();
        $iglesia_grupo = $iglesia->iglesia_grupo;
        // $conteomiembros = DB::table('iglesia as i')
        // ->join('group_per_chuch_plan as gpc', 'gpc.iglesia_id', '=', 'i.id')
        // ->join('grupo as g', 'g.id', '=', 'gpc.group_id')
        // ->join('member as p', function ($join) {
        //     $join->on('p.organization_id', '=', 'i.id')
        //         ->on('p.id', '=', 'user_has_group.member_id');
        // })
        // ->join('user_has_group as q', function ($join) {
        //     $join->on('p.id', '=', 'q.member_id')
        //         ->on('q.group_per_church_id', '=', 'gpc.id');
        // })
        // ->where('i.id', 28)
        // ->groupBy('i.id', 'i.name', 'g.id', 'g.nombre')
        // ->select('i.id as iglesia_id', 'i.name as nombre_iglesia', 'g.id as No_grupo', 'g.nombre as nombre_grupo', DB::raw('count(*) as numero_participantes'))
        // ->get();
        ///dd($iglesia->id);

        $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo , count(*) as numero_participantes
        from iglesia i
        join group_per_chuch_plan gpc
        on gpc.iglesia_id = i.id
        join grupo g on
        g.id = gpc.group_id
        join member p on
        p.organization_id=i.id
        join user_has_group q on
        p.id=q.member_id
        and q.group_per_church_id=gpc.id
        where i.id=?
        group by i.id , i.name  , g.id , g.nombre ";

        $conteo_miembros = DB::select($sql, array($iglesia->id));

        $sql2 = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member
from iglesia i
join group_per_chuch_plan gpc
on gpc.iglesia_id = i.id
join grupo g on
g.id = gpc.group_id
join member p on
p.organization_id=i.id
join user_has_group q on
p.id=q.member_id
and q.group_per_church_id=gpc.id
where i.id=?";

        $miembros_iglesia = DB::select($sql2, array($iglesia->id));
        // dd($iglesiagp,$iglesia_grupo);

        $sql3 = "select a.id iglesia_grupo,a.iglesia_id,a.group_id No_grupo,b.nombre nombre_grupo FROM urban_stategies.group_per_chuch_plan a,urban_stategies.grupo b
where a.group_id=b.id
and a.iglesia_id=?";

        $grupos_iglesia = DB::select($sql3, array($iglesia->id));





        $urlgrupo1 =  $request->root() . "/registro_participantes/" . $iglesia->id;


        QrCode::format('png')->size(200)->generate($url, public_path('img/qrcodeiglesia.png'));


        return view('auth.datos_iglesia', compact('departamentos',  'iglesia', 'conteo_miembros', 'miembros_iglesia', 'grupos_iglesia'));
        //return view('auth.register_member', compact('departamentos'));
    }
}
