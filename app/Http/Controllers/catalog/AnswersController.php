<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Answer;
use App\Models\catalog\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::get();
        $questions =Question::get();


        return view('catalog.answer.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::get();
        $answers = Answer::get();
        return view('catalog.answer.create', compact('questions'));
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
            'description.required' => 'ingresar la Respuesta',
            'catalog_questions_id.required' => 'seleccionar la pregunta',
        ];



        $request->validate([

            'description' => 'required',
            'catalog_questions_id' => 'required',

        ], $messages);
        $answer = new Answer();
        $answer->description = $request->description;
        $answer->catalog_questions_id = $request->catalog_questions_id;
        // if ($request->correct_answer == null) {
        //     $answer->correct_answer = 0;
        // } else {
        //     $answer->correct_answer = 1;
        // }

        $answer->save();

        $question =Question::findOrFail($request->catalog_questions_id);
        $question->question_has_answer()->attach($answer->id);

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


        $answer =  Answer::findOrFail($id);
        $questions = Question::get();

        return view('catalog.answer.edit', compact('answer','questions'));

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
            'description.required' => 'ingresar la Respuesta',
            'catalog_questions_id.required' => 'seleccionar la pregunta',
        ];



        $request->validate([

            'description' => 'required',
            'catalog_questions_id' => 'required',

        ], $messages);


        $answer = Answer::findOrFail($id);
        $answer->description = $request->description;
        $answer->catalog_questions_id = $request->catalog_questions_id;

       // $answer->correct_answer = $request->correct_answer;
        if ($request->correct_answer == 1) {
            $answer->correct_answer = 1;
        } else {
            $answer->correct_answer = 0;
        }
        $answer->save();
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
      
        $answer = Answer::findOrFail($id);
        $question =Question::findOrFail($answer->catalog_questions_id);
        $question->question_has_answer()->detach($answer->id);
        $answer->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();
    }

    public function add_answer(Request $request){
        
    }
}

