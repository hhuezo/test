<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Course;
use App\Models\catalog\StudyPlan;
use App\Models\catalog\StudyPlanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan_estudio = StudyPlan::get();
        return view('catalog.plan_estudios.index', compact('plan_estudio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cursos = Course::get();
        return view('catalog.plan_estudios.create');
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
            'description_es.required' => 'ingresar nombre de Plan de Estudios',
        ];

        $request->validate([

            'description_es' => 'required',

        ], $messages);

        $studyPlan = new StudyPlan();
        $studyPlan->description = $request->description;
        $studyPlan->description_es = $request->description;
        $studyPlan->save();

        alert()->success('El registro ha sido agregado correctamente');
        return redirect('catalog/plan_estudios/' . $studyPlan->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan_estudio = StudyPlan::findOrFail($id);


        $plandetalle = StudyPlanDetail::join('course', 'study_plan_detail.course_id', '=', 'course.id')
            ->where('study_plan_detail.study_plan_id', $plan_estudio->id)
            ->select('study_plan_detail.id', 'course.name_es', 'course.description_es', 'course.id as course_id')
            ->get();

        $cursos_id = $plandetalle->pluck('course_id')->toArray();
        $cursos = Course::whereNotIn('id', $cursos_id)->get();
        return view('catalog.plan_estudios.edit', compact('plan_estudio', 'cursos', 'plandetalle'));
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
            'description_es.required' => 'ingresar nombre de Plan de Estudios',
        ];

        $request->validate([

            'description_es' => 'required',

        ], $messages);

        $StudyPlan =  StudyPlan::findOrFail($id);
        $StudyPlan->description = $request->description;
        $StudyPlan->description_es = $request->description_es;
        $StudyPlan->update();
        //$StudyPlandetail=  StudyPlandetail::where('course_id','=',$request->course_id)::where('StudyPlandetail->study_plan_id','=', $request->plan_id)->get();
        // $StudyPlandetail->course_id = $request->course_id;
        // $StudyPlandetail->study_plan_id = $request->plan_id;
        // $StudyPlandetail->update();
        alert()->success('El registro ha sido agregado correctamente');
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
        $StudyPlan = StudyPlan::findOrFail($id);
        //dd($question);
        $StudyPlan->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function attach_cursos(Request $request)
    {
        $StudyPlan =  StudyPlan::findOrFail($request->study_plan_id);

        foreach ($request->course_id as $obj) {
            $StudyPlandetail = new StudyPlanDetail();
            $StudyPlandetail->study_plan_id =  $StudyPlan->id;
            $StudyPlandetail->course_id =  $obj;
            $StudyPlandetail->save();
        }

        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }

    public function dettach_cursos(Request $request)
    {
        //dd($request->id);        dd($request->study_plan_id, $request->course_id);

        $StudyPlan = StudyPlanDetail::findOrFail($request->id);
        //StudyPlan::findOrFail($request->study_plan_id);
        $StudyPlan->delete();
        //  $StudyPlandetail=  StudyPlandetail::where('course_id','=',$request->course_id)::where('study_plan_id','=',  $StudyPlan->id)->get();
        //  dd($StudyPlandetail);
        // $StudyPlandetail->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
