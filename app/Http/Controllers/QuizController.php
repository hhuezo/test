<?php

namespace App\Http\Controllers;

use App\Models\Quiz\Answer;
use App\Models\Quiz\Question;
use App\Models\Quiz\Quiz;
use FontLib\Table\Type\cmap;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {

        return view('Quiz.index');
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

        $Quiz = new Quiz();
        $Quiz->name_es = $request->name;
        $Quiz->name_en = $request->name;
        $Quiz->course_id = $request->course_id;
        $Quiz->save();

        return redirect('Quiz/' . $Quiz->id.'/edit');

    }


    public function show($id)
    {
        $questions = Question::get();
        $answers = Answer::get();
        return view('Quiz.show',compact('questions','answers'));
    }


    public function edit($id)
    {
        return view('Quiz.edit', compact('id'));
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
