<?php

namespace App\Http\Controllers;

use App\Models\quiz\Answer;
use App\Models\quiz\Question;
use App\Models\quiz\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Error, el titulo es requerido',
        ];

        $request->validate([
            'name'=> 'required',
        ], $messages);

        $quiz = new Quiz();
        $quiz->name_es = $request->name;
        $quiz->name_en = $request->name;
        $quiz->course_id = $request->course_id;
        $quiz->save();

        return redirect('quiz/' . $quiz->id.'/edit');

    }


    public function show($id)
    {
        $questions = Question::get();
        $answers = Answer::get();
        return view('quiz.show',compact('questions','answers'));
    }


    public function edit($id)
    {
        return view('quiz.edit', compact('id'));
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
