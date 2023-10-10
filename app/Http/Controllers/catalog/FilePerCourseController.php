<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Course;
use App\Models\catalog\FilePerCourse;
use Illuminate\Http\Request;
use Exception;

class FilePerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fcourse = FilePerCourse::get();
        $course = Course::get();

        return view('catalog.file_course.index', compact('Fcourse', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Fcourse = FilePerCourse::get();
        $course = Course::get();
        return view('catalog.file_course.create', compact('course'));
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
            'name.required' => 'ingresar nombre',
            'archivo.required' => 'Error, no se ha elegido ningun archivo',
            'archivo.mimetypes' => 'Error, formato no válido',
        ];



        $request->validate([

            'name.required' => 'ingresar nombre ',
            'archivo' => 'required',
        ], $messages);



        $archivo = $request->file('archivo');
        $filename = $archivo->getClientOriginalName();
        $path = uniqid() . $filename;
        $destinationPath = public_path('/docs');
        $archivo->move($destinationPath, $path);








        $Filecourse = new FilePerCourse();
        $Filecourse->id = $request->id;
        $Filecourse->course_id = $request->course_id;
        $Filecourse->route = $path;
        $Filecourse->name = $filename;
        //$Filecourse->created_add = $request->created_add;
        $Filecourse->save();

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
        $Fcourse =  FilePerCourse::findOrFail($id);
        $course = Course::get();
        return view('catalog.file_course.edit', compact('Fcourse', 'course'));

        alert()->success('El registro ha sido Modificado correctamente');
        return back();
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
            'name.required' => 'ingresar nombre',
            'archivo.required' => 'Error, no se ha elegido ningun archivo',
            'archivo.mimetypes' => 'Error, formato no válido',
        ];



        $request->validate([

            'name.required' => 'ingresar nombre ',
            'archivo' => 'required',
        ], $messages);

        $Filecourse =  FilePerCourse::findOrFail($id);
        if ($Filecourse->route)
        {
            try {
                unlink(public_path("docs/") . $Filecourse->route);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }


        $archivo = $request->file('archivo');
        $filename = $archivo->getClientOriginalName();
        $path = uniqid() . $filename;
        $destinationPath = public_path('/docs');
        $archivo->move($destinationPath, $path);


        //$Filecourse->id = $request->id;
       // $Filecourse->course_id = $request->course_id;
        $Filecourse->route = $path;

        $Filecourse->name = $filename;
        //$Filecourse->created_add = $request->created_add;
        $Filecourse->save();

        alert()->success('El registro ha sido modificado correctamente');
        return back();
    }


    public function destroy($id)
    {
        $Fcourse = FilePerCourse::findOrFail($id);

        if ($Fcourse->route)
        {
            try {
                unlink(public_path("docs/") . $Fcourse->route);
            } catch (Exception $e) {
                //return $e->getMessage();
            }
        }
        //dd($question);
        $Fcourse->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
