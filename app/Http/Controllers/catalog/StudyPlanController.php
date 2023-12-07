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
        $cursos = Course::get();


        return view('catalog.plan_estudios.create',compact('cursos'));


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

        $StudyPlan = new StudyPlan();
        $StudyPlan->description = $request->description;
        $StudyPlan->description_es= $request->description_es;
        $StudyPlan->save();
        $StudyPlandetail=new StudyPlanDetail();
        $StudyPlandetail->course_id = $request->course_id;
        $StudyPlandetail->study_plan_id =   $StudyPlan->id;
        $StudyPlandetail->save();
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
->select('course.id','course.name_es', 'course.description_es')
->get();

 //dd($plandetalle);
        //  $StudyPlandetail=  StudyPlandetail::where('study_plan_id','=', $plan_estudio->id)->get();
         // dd($StudyPlandetail);
          // $plandetalle=   $plan_estudio->detalles;
         // $StudyPlandetail->pluck('course_id')->toArray();
          //  $StudyPlandetail;
        //$plan_estudio->detalles;
 //$plandetalle= $StudyPlandetail;
      //  $plan_estudio_detalles=StudyPlanDetail::findOrFail($plandetalle);               //StudyPlanDetail::where('study_plan_id','=',$plan_estudio->id);
       // $plan_cursos= $plan_estudio_detalles->curso;       // dd($plan_cursos);
        //dd($plan_cursos );
        $cursos = Course::get();
        return view('catalog.plan_estudios.edit', compact('plan_estudio','cursos','plandetalle'));

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
        $StudyPlan->description_es= $request->description_es;
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
        $StudyPlan= StudyPlan::findOrFail($id);
        //dd($question);
        $StudyPlan->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function attach_cursos(Request $request)
    {

        $StudyPlandetail =  StudyPlandetail::findOrFail($request->study_plan_id);
        $StudyPlandetail->plan_estudio()->attach($request->course_id);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }
    public function dettach_cursos(Request $request)
    {

        $StudyPlandetail =  StudyPlandetail::findOrFail($request->study_plan_id);
        $StudyPlandetail->curso()->detach($request->course_id);
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }




}
