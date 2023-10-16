<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\WizardQuestions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WizardQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wizzarquestion = WizardQuestions::where('active' ,'=',1)->get();

        return view('catalog.wizard_church_questions.index', compact('wizzarquestion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wizzarquestion = WizardQuestions::get();

        return view('catalog.wizard_church_questions.create', compact('wizzarquestion'));
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
            'question.required' => 'Error, la pregunta es requerida',
            'answer.required' => 'Error, la respuesta es requerida',
        ];

        $request->validate([
            'question'=> 'required',
            'answer'=> 'required' ,
        ], $messages);

        $time = Carbon::now('America/El_Salvador');
        $wizzarquestion = new WizardQuestions();
        $wizzarquestion->question = $request->question;
        $wizzarquestion->answer = $request->answer;
        $wizzarquestion->active =1;
        $wizzarquestion->date_added = $time->toDateTimeString();
        $wizzarquestion->save();
        alert()->success('El registro ha sido creado correctamente');
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
        $wizzarquestion = WizardQuestions::findOrFail($id);
        return view('catalog.wizard_church_questions.edit', compact('wizzarquestion'));
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
            'question.required' => 'Error, la pregunta es requerida',
            'answer.required' => 'Error, la respuesta es requerida',
        ];

        $request->validate([
            'question'=> 'required',
            'answer'=> 'required' ,
        ], $messages);


        $wizzarquestion=  WizardQuestions::findOrFail($id);
        $wizzarquestion->question = $request->question;
        $wizzarquestion->answer = $request->answer;
        $wizzarquestion->update();
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
        $wizzarquestion = WizardQuestions::findOrFail($id);
        //dd($question);
        $wizzarquestion ->active=0;
        $wizzarquestion->update();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
