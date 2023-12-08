<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\administracion\Sesion;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\StudyPlan;
use App\Models\catalog\StudyPlanDetail;
use Illuminate\Http\Request;

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

        $participantes = $plan->iglesia->participantes($plan->iglesia_id)->where('group_id', '=', $plan->group_id)->where('status_id', '=', 2);
        $sesiones = Sesion::where('group_per_church_id', '=', $plan->id)->get();

        return view('administracion.iglesia_plan_estudio.show', compact(
            'plan',
            'iglesia',
            'sesiones',
            'participantes',
        ));
    }



   /* public function array_temas(Request $request)
    {
        return $request->temaArray;
    }*/

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
