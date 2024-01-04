<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\administracion\AsistenciaSesion;
use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\administracion\ReglasGenerales;
use App\Models\administracion\Sesion;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Course;
use App\Models\catalog\Departamento;
use App\Models\catalog\Gender;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\Municipio;
use App\Models\catalog\OrganizationStatus;
use App\Models\catalog\Sede;
use App\Models\catalog\WizardQuestions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class IglesiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iglesia = Iglesia::where('status_id', '<>', 3)->get();
        $iglesias_rechazadas = Iglesia::where('status_id', '=', 3)->get();
        //   dd($iglesia);
        $estatuorg = OrganizationStatus::where('id', '<=', 3)->get();

        $sede=sede::get();
        return view('catalog.iglesia.index', compact('sede','iglesia', 'estatuorg', 'iglesias_rechazadas'));
    }

    public function create()
    {
        $sede = Sede::get();
        $depto = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();
        $estatuorg = OrganizationStatus::get();
        return view('catalog.iglesia.create', compact('sede', 'depto', 'municipio', 'sede', 'estatuorg'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'ingresar nombre de la organizacion',
        ];



        $request->validate([

            'name' => 'required',

        ], $messages);
        $grupos = Grupo::get();


        $organizations = new Iglesia();
        $organizations->name = $request->name;
        $organizations->address = $request->address;
        $organizations->catalog_departamento_id = $request->departamento_id;
        $organizations->catalog_municipio_id = $request->municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status_id = 1;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = "./images";
        $organizations->logo = $filename;
        $organizations->save();





        foreach ($grupos as $obj) {
            $organizations->iglesia_has_grupo()->attach($obj->id);
        }


        $user = new User();
        $user->name = $request->pastor_name;
        $user->email = $request->email_contact;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();
        $user->assignRole('encargado');

        $user->user_has_iglesia()->attach($organizations->id);

        $preguntas =  WizardQuestions::where('active', '=', '1')->get();

        $time = Carbon::now('America/El_Salvador');
        foreach ($preguntas as $obj) {

            $repuestas = new ChurchQuestionWizard;
            $repuestas->question_id = $obj->id;
            $repuestas->iglesia_id = $organizations->id;
            $repuestas->answer = 1;
            $repuestas->date_added = $time->toDateTimeString();
            $repuestas->save();
        }

        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function actualizar_imagen(Request $request){
        //dd();

        $iglesia = Iglesia::findOrFail($request->id_iglesia);
        if ($request->file('logo_name')) {
            try {
                $url = public_path('/images/') . $iglesia->logo;

                unlink($url);
            } catch (Exception $e) {
            }
            $archivo = $request->file('logo_name');
            $filename = $archivo->getClientOriginalName();
            $path = $filename;
            $destinationPath = public_path('/images');
            $archivo->move($destinationPath, $path);
            $iglesia->logo_url = "./images"; /// $destinationPath;
            $iglesia->logo = $filename;
        }
        $iglesia->update();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }


    public function edit($id)
    {

        $iglesia = Iglesia::findOrFail($id);
        $cohorte = Cohorte::get();
        $depto = Departamento::where('id', '=', $iglesia->catalog_departamento_id)->get();
        $deptos = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $iglesia->id)->get();

        $questionArray = $wizzaranswer->pluck('question_id')->toArray();

        $wizzarquestion = WizardQuestions::whereNotIn('id', $questionArray)->where('active', '=', 1)->get();

        $grupo_iglesias =  $iglesia->iglesia_has_grupo;

        
        $url =  url('/') . "/registro_participantes/" . $iglesia->id . '/';

        foreach ($grupo_iglesias as $obj) {
            $obj->conteo = $iglesia->countMembers($iglesia->id, $obj->id);
            $obj->codigo_qr = 'qrcodeiglesiagrupo' . $obj->id . '.png';
            QrCode::format('png')->size(200)->generate($url . '/' . $obj->id, public_path('img/qrcodeiglesiagrupo' . $obj->id . '.png'));
        }


        QrCode::format('png')->size(200)->generate($url . '0', public_path('img/qrcodeiglesia.png'));

        $grupoArray =  $grupo_iglesias->pluck('id')->toArray();

        $grupos_noasignados = Grupo::whereNotIn('id', $grupoArray)->get();
        $grupos_asignados = Grupo::whereIn('id', $grupoArray)->get();
        $codigos = ReglasGenerales::get();

        return view('catalog.iglesia.edit', compact('iglesia','codigos' ,'cohorte', 'depto', 'municipio', 'sede', 'estatuorg',  'wizzaranswer', 'wizzarquestion', 'deptos',  'grupo_iglesias', 'grupos_asignados', 'grupos_noasignados'));
    }

    public function update(Request $request, $id)
    {
        $organizations = Iglesia::findOrFail($id);

        $organizations->name = $request->name;
        $organizations->address = $request->address;

        $organizations->catalog_departamento_id = $request->catalog_departamento_id;
        $organizations->catalog_municipio_id = $request->catalog_municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status_id = $request->status_id;
        $organizations->sede_id = $request->sede_id;
      

        $organizations->update();

        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }


    public function attach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //    dd( $wizzaranswer, $wizzaranswer->first() );
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->update();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }



    public function dettach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        $wizzarquestion = WizardQuestions::where('id', '=',  $request->question_id)->first();
        $wizzaranswer->delete();
        // $wizzarquestion->delete();
        alert()->error('La  Respuesta han sido eliminadas correctamente');
        return back();
    }



    public function attach_grupos(Request $request)
    {

        // dd($request->group_id,$request->iglesia_id);
        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesia_grupo()->attach($request->group_id);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }



    public function dettach_grupos(Request $request)
    {

        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->detach($request->group_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();
    }


    public function modificar_estado(Request $request)
    {
        ///     dd($request->status_id,$request->iglesia_id);
        $iglesia = iglesia::findOrFail($request->iglesia_id);
        if ($request->status_id == 2) {
            $sede = DB::table('sede as s')
                ->join('cohorte as c', 'c.id', '=', 's.cohorte_id')
                ->where('c.region_id', $iglesia->departamento->region_id)
                ->select('s.id', DB::raw('(SELECT COUNT(*) FROM iglesia i WHERE i.sede_id = s.id) AS conteo'))
                ->having('conteo', '<', 5)
                ->first();

            if ($sede) {
                $sede_id = $sede->id;
            } else {
                $cohort = Cohorte::where('region_id', '=', $iglesia->departamento->region_id)
                    ->select('id', DB::raw('(COUNT(*)) AS conteo'))
                    ->groupBy('id')
                    ->having('conteo', '<', 20)->first();

                if ($cohort) {
                    $cohort_id = $cohort->id;
                } else {
                    $cohort_new = new Cohorte();
                    $cohort_new->nombre = "congregación";
                    $cohort_new->region_id = $iglesia->departamento->region_id;
                    $cohort_new->save();

                    $cohort_id = $cohort_new->id;
                }

                $sede_new = new Sede();
                $sede_new->nombre =  "Sede";
                $sede_new->cohorte_id = $cohort_id;
                $sede_new->save();

                $sede_id = $sede_new->id;
            }
        }
        $iglesia->sede_id = $sede_id;
        $iglesia->status_id = $request->status_id;
        $iglesia->update();
        alert()->success('El Estado ha sido Modificado correctamente');
        return back();
    }



    public function add_preguntaresp(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request);
        // $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //  $wizzarquestion = WizardQuestions::where('id' ,'=',  $request->question_id)->first();
        // $time = Carbon::now('America/El_Salvador');
        $wizzaranswer = new ChurchQuestionWizard();

        //  $wizzarquestion->date_added = $time->toDateTimeString();

        $wizzaranswer->question_id = $request->question_id;
        $wizzaranswer->iglesia_id = $request->iglesia_id;
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->save();
        alert()->success('La Pregunta y Respuesta han sido agregado correctamente');
        return back();
    }


    public function destroy($id)
    {
        $iglesia = Iglesia::findOrFail($id);
        //dd($question);
        $iglesia->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }



    public function show($id)
    {

        $iglesia = Iglesia::findOrFail($id);

        $participantes = $iglesia->participantes($id);
        $grupos = $iglesia->iglesia_has_grupo;

        return view('catalog.iglesia.show', compact('iglesia', 'participantes', 'grupos'));
    }


    public function reporte_asistencias($id)
    {

        $iglesia = Iglesia::findOrFail($id);

        $plan_estudio = IglesiaPlanEstudio::where('iglesia_id', '=', $iglesia->id)->get();
        $plan_estudio_array = $plan_estudio->pluck('id')->toArray();
        $sessiones = Sesion::whereIn('group_per_church_id',  $plan_estudio_array)->get();

        $genero = Gender::get();
        $sessiones_array = $sessiones->pluck('id')->toArray();

        $asistencia_sesion = AsistenciaSesion::whereIn('sessions_id', $sessiones_array)->get();


        $grupos_iglesia = $iglesia->iglesia_has_grupo;

        $gruposall = $iglesia->participantes_iglesia($iglesia->id);

        $participantes_array = $asistencia_sesion->pluck('member_id')->unique()->values()->toArray();


        $participantes =  Member::whereIn('id', $participantes_array)->get();

        $cursos = Course::get();




        return view('catalog.iglesia.reporte_asistencias', compact('cursos', 'gruposall', 'grupos_iglesia', 'iglesia', 'sessiones', 'participantes', 'genero'));


     //$pdf = \Pdf::loadView('catalog.iglesia.reporte_asistencias', compact('cursos','gruposall','grupos_iglesia','iglesia', 'sessiones', 'participantes', 'genero'));



        //$pdf = \Pdf::loadView('catalog.iglesia.reporte_asistencias', compact('cursos', 'gruposall', 'grupos_iglesia', 'iglesia', 'sessiones', 'participantes', 'genero'));

        //$pdf->setPaper('A4', 'landscape');
        //return $pdf->stream('test_pdf.pdf');
    }





    public function validarEdad($id)
    {
        $participante = Member::findOrFail($id);

        $fechaNacimiento = Carbon::parse($participante->birthdate);
        $edad = $fechaNacimiento->age;

        if ($edad >= 18) {
            return true;
        }

        return false;
    }

    public function set_grupo($paticipanteId, $grupoId)
    {
        $participante = Member::findOrFail($paticipanteId);

        $grupoId = str_replace("c", "", $grupoId);

        if ($grupoId == 1) {
            if ($this->validarEdad($paticipanteId) == true) {
                $response = ["val" => 0, "mensaje" => "El participante es mayor de edad"];
                return $response;
            }
        } else {
            if ($this->validarEdad($paticipanteId) == false) {
                $response = ["val" => 0, "mensaje" => "El participante es menor de edad"];
                return $response;
            }



            if ($grupoId == 2 && $participante->catalog_gender_id == 1) {
                $response = ["val" => 0, "mensaje" => "El genero del participante no es válido"];
                return $response;
            }

            if ($grupoId == 3 && $participante->catalog_gender_id == 2) {
                $response = ["val" => 0, "mensaje" => "El genero del participante no es válido"];
                return $response;
            }
        }


        $record = DB::table('member_has_group')->where('member_id', '=', $paticipanteId)->delete();

        $participante->member_has_group()->attach($grupoId);

        return  $response = ["val" => 1, "mensaje" => "Ok"];
    }


    public function copiarImagen(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombreImagen = $imagen->getClientOriginalName();
            $carpetaDestino = public_path('./images');
            $imagen->move($carpetaDestino, $nombreImagen);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }


    public function  reporte_grupos($iglesiaId, $grupoId)
    {

        $iglesia = Iglesia::findOrFail($iglesiaId);

        $participantes =  $iglesia->participantes($iglesiaId)->where('group_id', '=', $grupoId);


        // dd($participantes);


        return view('catalog.iglesia.reporte', compact('iglesia', 'participantes'));

        dd($participantes);
        /*   $grupos_iglesia =  GroupPerchuchPlan::findorfail($id_grupo_iglesia);

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




        $pdf = \Pdf::loadView('catalog.grupo.reporte_grupos', compact('miembros', 'iglesia', 'usuarios', 'grupo', 'member_status'));
        return $pdf->stream('Info.pdf');*/
    }
}
