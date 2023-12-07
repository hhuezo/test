<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Course = Course::get();


        return view('catalog.course.index', compact('Course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Course = Course::get();

        return view('catalog.course.create', compact('Course'));
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
            'name_es.required' => 'ingresar Nombre del curso',

        ];



        $request->validate([

            'name_es' => 'required',


        ], $messages);
        $courses = new Course();
        $courses->name =  $request->name_es;
        $courses->name_es = $request->name_es;
        $courses->description = $request->description_es;
        $courses->description_es = $request->description_es;
        $courses->image = $request->image;

        $archivo = $request->file('imagen');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $courses->image = "./images";
        $courses->image = $courses->image . $filename;
        $courses->save();
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

        $courses =  Course::findOrFail($id);

        return view('catalog.course.edit', compact('courses'));
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

        // //dd($request->file('imagen'));
        // $messages = [
        //     'course.name_es.required' => 'ingresar nombre del curso',
        // ];

        // $request->validate([

        //     'course.name_es' => 'required',

        // ], $messages);



        $courses = Course::findOrFail($id);
        $courses->name = $request->name_es;
        $courses->name_es = $request->name_es;
        $courses->description = $request->description_es;
        $courses->description_es = $request->description_es;


        $id_file = uniqid();

        $archivo = $request->file('imagen');
        $filename = $id_file . ' ' .  $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $courses->image = "./images";
        $courses->image = $request->image . $filename;
        $courses->update();
        alert()->success('El registro ha sido Modificado correctamente');
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
        $courses = course::findOrFail($id);
        //dd($question);
        $courses->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
