<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\AsistenciaSesion;
use App\Models\administracion\Sesion;
use App\Models\catalog\Course;
use App\Models\catalog\Gender;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use Illuminate\Http\Request;
use App\Models\administracion\IglesiaPlanEstudio;

use pdf;



class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesia=Iglesia::get();
        return view('administracion.reportes.index',compact('iglesia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       // return view('administracion.reportes.plantilla_reportes');
    }


    public function reportes_plantilla()
    {

     //   $iglesia=Iglesia::get();        return view('administracion.reportes.index',compact('iglesia'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

              $pdf = \Pdf::loadView('administracion.reportes.plantilla_reportes', compact('cursos', 'gruposall', 'grupos_iglesia', 'iglesia', 'sessiones', 'participantes', 'genero'));



        //$pdf = \Pdf::loadView('catalog.iglesia.reporte_asistencias', compact('cursos', 'gruposall', 'grupos_iglesia', 'iglesia', 'sessiones', 'participantes', 'genero'));

        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('test_pdf.pdf');



      //  return view('administracion.reportes.plantilla_reportes', compact('cursos', 'gruposall', 'grupos_iglesia', 'iglesia', 'sessiones', 'participantes', 'genero'));


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
