<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Answer;
use App\Models\catalog\AnswerQuestion;
use App\Models\catalog\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $questions = Question::get();

        return view('catalog.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalog.question.create');
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
            'description.required' => 'ingresar la pregunta',
        ];



        $request->validate([

            'description' => 'required',

        ], $messages);

        $question = new Question();
        $question->description = $request->description;
        $question->save();

        alert()->success('El registro ha sido agregado correctamente');
        return redirect('catalog/question/'.$question->id.'/edit');
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
        $questions= Question::findOrFail($id);
        $answers = Answer::get();
        $question_has_answered = AnswerQuestion::where('question_id',$id)->get();
        

        return view('catalog.question.edit', compact('questions','answers','question_has_answered'));



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
            'description.required' => 'ingresar la pregunta',
        ];



        $request->validate([

            'description' => 'required',

        ], $messages);

        $question= Question::findOrFail($id);
        $question->description = $request->description;
        $question->save();

        alert()->success('El registro ha sido Modificado correctamente');
        return back();
       // dd($question);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $question= Question::findOrFail($id);
        //dd($question);
        $question->delete();
        alert()->info('El registro ha sido eliminado correctamente');
        return back();

    }

    public function attach_questions(Request $request){

        //dd($request->question_id, $request->answer_id);
        $exist = AnswerQuestion::where('question_id',$request->question_id)->where('answer_id',$request->answer_id)->first();
        if($exist){
            alert()->error('La respuesta no se puede duplicar');
        }else{
            $question =Question::findOrFail($request->question_id);
            $question->question_has_answer()->attach($request->answer_id);
    
            alert()->success('El registro ha sido agregado correctamente');
        }
        
        return back();
     }

     public function dettach_questions(Request $request){


        $question =Question::findOrFail($request->question_id);
        $question->question_has_answer()->detach($request->answer_id);
      
        
        //->detach($request->answer_id);
        
        alert()->success('El registro ha sido eliminado correctamente');
        return back();
      }

      public function correct_answer(Request $request){
        $question_has_answered = AnswerQuestion::where('question_id',$request->question_id )->where('correct',1)->first();

        if($question_has_answered){
            alert()->error('la pregunta ya tiene una respuesta correcta');
        }else{
            
            $answers_question = AnswerQuestion::findOrFail($request->id);
            $answers_question->correct = 1;
            $answers_question->update();

            alert()->success('La respuesta fue seleccionada como correcta');
        }

         return back();
      }

      public function delete_correct_answer(Request $request){
        $answers_question = AnswerQuestion::findOrFail($request->id);
        $answers_question->correct = 0;
        $answers_question->update();

        alert()->success('La respuesta fue seleccionada como correcta');
     return back();
  }
}
