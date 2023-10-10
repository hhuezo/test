<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Quiz;
use Illuminate\Http\Request;
use App\Models\catalog\Course;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Quiz =Quiz::get();
        $courses =Course::get();

        return view('catalog.Quiz.index', compact('Quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Quiz = Quiz::get();
        $courses =Course::get();
        return view('catalog.Quiz.create', compact('courses'));


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
            'name_es.required' => 'ingresar nombre',
        ];



        $request->validate([

            'name_es.required' => 'ingresar nombre',

        ], $messages);

        $Quiz = new Quiz();
        $Quiz->name_es = $request->name_es;
        $Quiz->name_en = $request->name_en;
        $Quiz->status = $request->status;
        $Quiz->date_created = $request->date_created;
        $Quiz->course_id = $request->course_id;
        $Quiz->save();

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
        $Quiz= Quiz::findOrFail($id);
        $courses =Course::get();
        return view('catalog.Quiz.edit', compact('Quiz','courses'));
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
            'name_es.required' => 'ingresar nombre del examen',
        ];



        $request->validate([

            'name_es' => 'required',

        ], $messages);
        $Quiz= Quiz::findOrFail($id);
        $Quiz->name_es = $request->name_es;
        $Quiz->name_en = $request->name_en;
        $Quiz->status = $request->status;
        $Quiz->date_created = $request->date_created;
        $Quiz->course_id = $request->course_id;


        $Quiz->save();

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
        $Quiz= Quiz::findOrFail($id);
        //dd($question);
        $Quiz->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }
}
