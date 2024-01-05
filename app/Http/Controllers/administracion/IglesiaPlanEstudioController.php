<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Imports\AsistenciaImport;
use App\Models\administracion\AsistenciaSesion;
use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\administracion\ReglasGenerales;
use App\Models\administracion\Sesion;
use App\Models\administracion\SesionDetalle;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\StudyPlan;
use App\Models\catalog\StudyPlanDetail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class IglesiaPlanEstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->hasRole('administrador') == true) {
            $planes = IglesiaPlanEstudio::get();
            // $iglesia_id = 48;   //dato quemado
        } else {
            $user = User::findOrFail(auth()->user()->id);
            //   $iglesia_id = $user->user_has_iglesia->first()->id;
            $planes = IglesiaPlanEstudio::where('iglesia_id', $user->user_has_iglesia->first()->id)->get();
        }

        return view('administracion.iglesia_plan_estudio.index', compact('planes'));
    }

    public function certificacion()
    {
        $now = Carbon::now('America/El_Salvador');
        //listar iglesias listas para certificarse

       //$iglesias = IglesiaPlanEstudio::join('iglesia','iglesia.id','=','group_per_chuch_plan.iglesia_id')
        $iglesias = Iglesia::join('group_per_chuch_plan as p', 'p.iglesia_id', '=', 'iglesia.id')
        ->where('iglesia.status_id', '=', 2)
        ->where('p.closed', '=', 1)
        ->where('p.end_date', '<=', now())
        ->groupBy('p.iglesia_id', 'p.id')  // Agregar la columna a GROUP BY
        ->get();

        dd($iglesias);


        



        //    dd("hombres trabajando");

        $iglesia = Iglesia::findOrFail(48); //dato quemado
        $planes = IglesiaPlanEstudio::where('iglesia_id', '=', $iglesia->id) //->where('end_date','<=', $now->format('Y-m-d'))
            ->get();

        return view('administracion.iglesia_plan_estudio.certificacion', compact('iglesia','planes'));
    }

    public function certificacion_participante($id)
    {   //para solamente participantes
        $iglesia = Iglesia::findOrFail($id);
        //busca los participantes para cambiarlos de estado a certificados.
        $members = $iglesia->participantes($iglesia->id)->where('status_id', '=', 2);

        foreach ($members as $obj) {
            //consultar cuantas sesiones
            $totalsesiones = AsistenciaSesion::where('member_id', '=', $obj->id)->get();
            //  $totalasistencias = AsistenciaSesion::where('member_id','=',$obj->id)->get();

            if ($totalsesiones->count() == $totalsesiones->where('attended', '=', 1)->count()) {
                $member = Member::findOrFail($obj->id);
                $member->status_id = 4;  //certificado;
                $member->update();
                //envio de correo a participante
            }
        }
        $iglesia->status_id = 8; //pendiente de certificacion
        $iglesia->update();
        alert()->success('Se han certificado los participantes de forma correcta');
        return back();
    }

    public function certificacion_iglesia($id)
    {  //para la iglesia y participantes
        //dd($id);

        $iglesia = Iglesia::findOrFail($id);
        //busca los participantes para cambiarlos de estado a certificados.
        $members = $iglesia->participantes($iglesia->id)->where('status_id', '=', 2);
        foreach ($members as $obj) {
            $member = Member::findOrFail($obj->id);
            $member->status_id = 4; //certificado;
            $member->update();

            //enviar correos a participantes

        }
        $iglesia->status_id = 7; ///iglesia certificada
        $iglesia->update();

        //enviar correo a contacto de iglesia

        alert()->success('Se ha certificado la iglesia de forma correcta');
        return back();
    }

    public function add_notes(Request $request)
    {
        $attended = AsistenciaSesion::findOrFail($request->id);
        $attended->notes = $request->notes;
        $attended->save();
        $response = ["val" => 1, "mensaje" => "Registro modificado correctamente"];
        return  $response;
    }

    public function subir_archivo(Request $request)
    {
        //    dd($request->sesion);
        //  dd($request->file('fileDocument'));
        $sesion = Sesion::findOrFail($request->sesion);
        if ($request->file('fileDocument')) {
            $file = $request->file('fileDocument');
            $nombreArchivo = uniqid() . $file->getClientOriginalName();
            $sesion->attendance_document = $nombreArchivo;
            $carpetaDestino = public_path('./attendance');
            $file->move($carpetaDestino, $nombreArchivo);
        }
        $sesion->completed = 1;
        $sesion->update();
        $plan = IglesiaPlanEstudio::findOrFail($sesion->group_per_church_id);
        $sesiones = Sesion::where('group_per_church_id', '=', $sesion->group_per_church_id)->get();
        if ($sesiones->where('completed', '=', 1)->count() == $sesiones->count()) {
            $plan->closed = 1; /// plan cerrado
            $plan->update();
        }
        alert()->success('Se subio el archivo correctamente');
        return back();
    }

    public function asistencia(Request $request)
    {
        $attended = AsistenciaSesion::findOrFail($request->id);
        if ($attended->attended == 0) {
            $attended->attended = 1;
        } else {
            $attended->attended = 0;
        }
        $attended->save();
        $response = ["val" => 1, "mensaje" => "Registro modificado correctamente"];
        return  $response;
    }

    public function delete_sesion(Request $request)
    {
        //dd($request->id_sesion);
        AsistenciaSesion::where('sessions_id', '=', $request->id_sesion)->delete();
        SesionDetalle::where('session_id', '=', $request->id_sesion)->delete();
        $sesion = Sesion::findOrFail($request->id_sesion);
        $sesion->delete();


        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }

    public function create()
    {
        $iglesias = Iglesia::where('status_id', '=', '2')->get();
        //   $count =  auth()->user()->user_has_iglesia->first()->id;
        $grupos = Grupo::where('active', '=', 1)->get();
        $planes_estudio = StudyPlan::get();
        return view('administracion.iglesia_plan_estudio.create', compact('iglesias', 'grupos', 'planes_estudio'));
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'iglesia_id.required' => 'La iglesia es requerida',
            'group_id.required' => 'El grupo es un valor requerido',
            'study_plan_id.required' => 'El plan de estudio es un valor requerido',
            'start_date.required' => 'La fecha de inicio es un valor requerido',
            'end_date.required' => 'La fecha final es un valor requerido',
        ];

        $request->validate([
            'name' => ['required'],
            'iglesia_id' => ['required'],
            'group_id' => ['required'],
            'study_plan_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ], $messages);

        if ($request->start_date > $request->end_date) {
            throw ValidationException::withMessages(['start_date' => ['Las fechas no son validas']]);
        } else {
            $plan = new IglesiaPlanEstudio();
            $plan->iglesia_id = $request->iglesia_id;
            $plan->group_id = $request->group_id;
            $plan->study_plan_id = $request->study_plan_id;
            $plan->name = $request->name;
            $plan->start_date = $request->start_date;
            $plan->end_date = $request->end_date;
            $plan->save();

            alert()->success('El registro ha sido agregado correctamente');
            return back();
        }
    }

    public function show($id)
    {

        //dd($id);
        $plan = IglesiaPlanEstudio::findOrFail($id);
        ///    dd($plan);
        $iglesia = Iglesia::findOrFail($plan->iglesia_id);

        $participantes = $plan->iglesia->participantes($plan->iglesia_id)->where('group_id', '=', $plan->group_id)->whereIn('status_id', [2, 4]);
        $sesiones = Sesion::where('group_per_church_id', '=', $plan->id)->get();

        //dd((!session()->has('show')));
        if (!session()->has('show')) {
            session_start();
            session(['show' => '1']);
            session(['id' => $id]);
        }

        return view('administracion.iglesia_plan_estudio.show', compact(
            'plan',
            'iglesia',
            'sesiones',
            'participantes',
        ));
    }

    public function edit($id)
    {
        $plan = IglesiaPlanEstudio::findOrFail($id);
        $iglesias = Iglesia::where('status_id', '=', '2')->get();
        $grupos = Grupo::where('active', '=', 1)->get();
        $planes_estudio = StudyPlan::get();
        $participantes = $plan->iglesia->participantes($plan->iglesia_id)->where('group_id', '=', $plan->group_id)->where('status_id', '=', 2);
        $cursos = StudyPlanDetail::where('study_plan_id', '=', $plan->study_plan_id)->get();

        return view('administracion.iglesia_plan_estudio.edit', compact(
            'plan',
            'iglesias',
            'grupos',
            'planes_estudio',
            'participantes',
            'cursos'
        ));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'iglesia_id.required' => 'La iglesia es requerida',
            'group_id.required' => 'El grupo es un valor requerido',
            'study_plan_id.required' => 'El plan de estudio es un valor requerido',
            'start_date.required' => 'La fecha de inicio es un valor requerido',
            'end_date.required' => 'La fecha final es un valor requerido',
        ];

        $request->validate([
            'name' => ['required'],
            'iglesia_id' => ['required'],
            'group_id' => ['required'],
            'study_plan_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
        ], $messages);

        $plan = IglesiaPlanEstudio::findOrFail($id);
        $plan->iglesia_id = $request->iglesia_id;
        $plan->group_id = $request->group_id;
        $plan->study_plan_id = $request->study_plan_id;
        $plan->name = $request->name;
        $plan->start_date = $request->start_date;
        $plan->end_date = $request->end_date;
        $plan->update();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $plan = IglesiaPlanEstudio::findOrFail($id);
        $plan->delete();

        alert()->success('El registro ha sido eliminado correctamente');
        return back();
    }

    public function importExcel(Request $request)
    {

        $imports = Excel::toArray(new AsistenciaImport, $request->file('fileExcel'));
        $jovenes = Member::leftjoin('attendance_per_session as a', 'member.id', '=', 'a.member_id')->where('a.sessions_id', $request->sesion)->whereNull('member.document_number')->select('member.id as id_member', 'member.*', 'a.*')->get();
        $adultos = Member::leftjoin('attendance_per_session as a', 'member.id', '=', 'a.member_id')->where('a.sessions_id', $request->sesion)->whereNotNull('member.document_number')->select('member.id as id_member', 'member.*', 'a.*')->get();
        foreach ($imports as $import) {
            unset($import[0]);  //descartar los encabezados
            unset($import[1]);
            $asistencia = array_values($import);
        }

        foreach ($asistencia as $asist) {
            if (!isset($asist[1])) { // no dui
                $this->asistenciaJovenes($asist, $jovenes, $request->sesion);
            } else {
                $this->asistenciaAdultos($asist, $adultos, $request->sesion);
            }
        }
        //  session_start();

        alert()->success('Las asistencias se agregaron correctamente correctamenteeee');
        //        return redirect('administracion/iglesia_plan_estudio/'.$request->sesion, ['show' => $show]);
        session(['id' => $request->sesion]);
        session(['show' => '0']);
        return back();
    }

    public function asistenciaAdultos($asistencia, $adultos, $sesion)
    {
        //dd($asistencia, $jovenes);
        foreach ($adultos as $obj) {
            $cell_phone = str_replace('-', '', $obj->cell_phone_number);
            $cell_excel = str_replace('-', '', $asistencia[2]);
            $number_dui = str_replace('-', '', $obj->document_number);
            $dui_excel = str_replace('-', '', $asistencia[1]);
            $name = $obj->name_member . ' ' . $obj->lastname_member;
            if ($number_dui == $dui_excel && $asistencia[10] == 1.0) {   //coinciden los duis
                //dd("1");
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            } else if ($obj->email == $asistencia[3] && $asistencia[10] == 1.0) {  //coinciden los email
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            } elseif ($cell_phone == $cell_excel && $asistencia[10] == 1.0) { //coinciden los numeros de telefonos
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            } elseif ($name == $asistencia[0] && $asistencia[10] == 1.0) { //coinciden los nombres
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            }
        }
    }

    public function asistenciaJovenes($asistencia, $jovenes, $sesion)
    {
        //dd($asistencia, $jovenes);
        foreach ($jovenes as $obj) {
            $cell_phone = str_replace('-', '', $obj->cell_phone_number);
            $cell_excel = str_replace('-', '', $asistencia[2]);
            $name = $obj->name_member . ' ' . $obj->lastname_member;
            if ($obj->email == $asistencia[3] && $asistencia[10] == 1.0) {  //coinciden los email
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            } elseif ($cell_phone == $cell_excel && $asistencia[10] == 1.0) { //coinciden los numeros de telefonos
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            } elseif ($name == $asistencia[0] && $asistencia[10] == 1.0) { //coinciden los nombres
                AsistenciaSesion::where('member_id', '=', $obj->member_id)->where('sessions_id', '=', $sesion)->update(['attended' => 1, 'notes' => $asistencia[11]]);
            }
        }
    }

    public function mostrar(Request $request)
    {

        $participant = AsistenciaSesion::where('sessions_id', '=', $request->get('session'))->get();
        //     dd($participantes);

        return view('administracion.iglesia_plan_estudio.asistencia', compact('participant'));
    }



    public function control_participante()
    {
        try {
            $user = User::findOrFail(auth()->user()->id);
            $participante = $user->usuario_participante->first();

            $grupo_id = $participante->member_has_group->first()->id;
            $iglesia_id = $user->user_has_iglesia()->first()->id;

            $member = Member::where('users_id', '=', $user->id)->first();
            $iglesia_plan = Iglesia::findorfail($iglesia_id);

            $iglesia = Iglesia::findorfail($iglesia_id);

            $plan = IglesiaPlanEstudio::where('group_id', '=', $grupo_id)->where('iglesia_id', '=',   $iglesia_id)->first();


            $participantes = $plan->iglesia->participantes($plan->iglesia_id)->where('group_id', '=', $plan->group_id)->where('status_id', '=', 2);

            $sesiones = Sesion::where('group_per_church_id', '=', $plan->id)->get();

            return view('administracion.iglesia_plan_estudio.participante_lista', compact(
                'plan',
                'iglesia',
                'sesiones',
                'participantes',
                'member'
            ));
        } catch (Exception $e) {
            $member = Member::where('users_id', '=', $user->id)->first();
            $member->status_id = 1;
            return view('administracion.iglesia_plan_estudio.participante_lista', compact('member'));
        }
    }
}
