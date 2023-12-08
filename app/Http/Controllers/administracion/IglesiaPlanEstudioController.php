<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\administracion\Sesion;
use App\Models\administracion\SesionDetalle;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\StudyPlan;
use App\Models\catalog\StudyPlanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IglesiaPlanEstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $planes = IglesiaPlanEstudio::get();
        return view('administracion.iglesia_plan_estudio.index', compact('planes'));
    }

    public function create()
    {
        $iglesias = Iglesia::where('status_id', '=', '2')->get();
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

    public function show($id)
    {
        $plan = IglesiaPlanEstudio::findOrFail($id);
        $iglesia = Iglesia::findOrFail($plan->iglesia_id);
        $grupos = Grupo::where('active', '=', 1)->get();

        $participantes = $plan->iglesia->participantes($plan->iglesia_id)->where('group_id', '=', $plan->group_id)->where('status_id', '=', 2);
        $sesiones = Sesion::where('group_per_church_id', '=', $plan->id)->get();

        $cursosId = DB::table('session_per_group_detail AS spgd')
            ->join('sessions AS s', 'spgd.session_id', '=', 's.id')
            ->select('spgd.course_id')
            ->where('s.group_per_church_id', '=', $plan->id)
            ->pluck('spgd.course_id')->toArray();


        $cursos = StudyPlanDetail::where('study_plan_id', '=', $plan->study_plan_id)->whereNotIn('course_id',$cursosId)->get();


        return view('administracion.iglesia_plan_estudio.show', compact(
            'plan',
            'iglesia',
            'grupos',
            'sesiones',
            'participantes',
            'cursos'
        ));
    }

    public function add_sesion(Request $request)
    {

        $messages = [
            'id.required' => 'El registro debe pertenecer a un plan de estudio',
            'session_name.required' => 'El nombre es un valor requerido',
            'meeting_date.required' => 'La fecha es un valor requerido',
            'meeting_date.date_format' => 'La fecha no es válida',
            'course_1.required' => 'El tema 1 es un valor requerido',
            'course_2.required' => 'El tema 2 es un valor requerido',
            'course_1.different' => 'Los valores no son permitidos. el Tema 1 no puede ser igual a Tema 2.',
        ];

        $request->validate([
            'id' => ['required'],
            'session_name' => ['required'],
            'meeting_date' => ['required', 'date_format:Y-m-d'],
            'course_1' => ['required', 'different:course_2'],
            'course_2' => ['required'],
        ], $messages);

        $sesion = new Sesion();
        $sesion->group_per_church_id = $request->id;
        $sesion->session_name = $request->session_name;
        $sesion->meeting_date = $request->meeting_date;
        $sesion->save();

        $detalle = new SesionDetalle();
        $detalle->session_id = $sesion->id;
        $detalle->course_id = $request->course_1;
        $detalle->save();

        $detalle2 = new SesionDetalle();
        $detalle2->session_id = $sesion->id;
        $detalle2->course_id = $request->course_2;
        $detalle2->save();


        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function array_temas(Request $request)
    {
        return $request->temaArray;
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
}
