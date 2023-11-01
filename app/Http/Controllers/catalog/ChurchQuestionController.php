<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Iglesia;
use App\Models\catalog\WizardQuestions;
use DB;
use Illuminate\Http\Request;

class ChurchQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wizzaranswer = ChurchQuestionWizard::get();
        $wizzarquestion = WizardQuestions::get();
        $iglesia= Iglesia::get();

        return view('catalog.answerreg.index', compact('iglesia','wizzaranswer','wizzarquestion'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $wizzaranswer = ChurchQuestionWizard::get();
        $wizzarquestion = WizardQuestions::get();
        $iglesia= Iglesia::get();

        return view('catalog.answerreg.create', compact('iglesia','wizzaranswer','wizzarquestion'));

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
       // dd( $id);

        $iglesia= Iglesia::findorfail($id);
       // dd($iglesia);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id' ,'=', $iglesia->id)->get();
        $wizzarquestion =WizardQuestions::get();//where('id' ,'=', $wizzaranswer->question_id)->get();
        $resultados = DB::table('church_question_wizard as a')
        ->join('wizard_church_questions as b', 'a.question_id', '=', 'b.id')
        ->where('a.iglesia_id', $iglesia->id)
        ->select('a.question_id','a.iglesia_id', 'b.question', 'a.answer')
        ->get();


        return view('catalog.answerreg.edit', compact('iglesia','wizzaranswer','wizzarquestion','resultados'));

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
        $organizations = Iglesia::findOrFail($id);
        $wizzaranswer=ChurchQuestionWizard::where('iglesia_id' ,'=', $organizations->id)->get();
         $wizzaranswer->question_id=$request->question_id    ;
         $wizzaranswer->answer=$request->answer;
         $wizzaranswer->save();
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

        $wizzaranswer = ChurchQuestionWizard::findOrFail($id);
        $wizzaranswer->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }
}
