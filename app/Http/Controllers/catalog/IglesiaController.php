<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Departamento;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Municipio;
use App\Models\catalog\Organization;
use App\Models\catalog\OrganizationStatus;
use App\Models\catalog\Sede;
use App\Models\catalog\WizardQuestions;
use App\Models\Quiz\Question;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesia = Iglesia::get();

        return view('catalog.iglesia.index', compact('iglesia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::get();
        $depto = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();
        $estatuorg = OrganizationStatus::get();
        return view('catalog.iglesia.create', compact('sede', 'depto', 'municipio', 'sede', 'estatuorg', ));
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
            'name.required' => 'ingresar nombre de la organizacion',
        ];



        $request->validate([

            'name' => 'required',

        ], $messages);
        $organizations = new Iglesia();
        $organizations->name = $request->name;
        $organizations->address = $request->address;
        $organizations->catalog_departamento_id = $request->catalog_departamento_id;
        $organizations->catalog_municipio_id = $request->catalog_municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status = $request->status;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = $destinationPath;
        $organizations->logo_name = $filename;
        $organizations->save();
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

       // dd('imprimo aqui');




        $iglesia = Iglesia::findOrFail($id);
        $cohorte = Cohorte::get();
        $depto = Departamento::where('id', '=', $iglesia->catalog_departamento_id)->get();
        $deptos = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        $organizacion = Organization::get();
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $iglesia->id)->get();
        //plural

        $questionArray = $wizzaranswer->pluck('question_id')->toArray();

        $wizzarquestion = WizardQuestions::whereNotIn('id', $questionArray)->get();


        $grupo_iglesias=  $iglesia->iglesiagrupo;

        //$grupos= Grupo::whereNotIn('id', $iglesiaArray)->get();
  // dd(   $grupo_iglesias);

        $grupoArray =  $grupo_iglesias->pluck('id')->toArray();

        $grupos_noasignados = Grupo::whereNotIn('id', $grupoArray)->get();
        $grupos_asignados = Grupo::where('id', $grupoArray)->get();


       // return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias','grupos_noasignados'));

        //   dd($wizzarquestion);
        //where('id' ,'=', $wizzaranswer->question_id)->get();
        //return view('catalog.iglesia.show', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion', 'wizzaranswer', 'wizzarquestion','deptos',  'grupo_iglesias' , 'grupos_asignados','grupos_noasignados'));

        $pdf = \PDF::loadView('catalog.iglesia.show',compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion', 'wizzaranswer', 'wizzarquestion','deptos',  'grupo_iglesias' , 'grupos_asignados','grupos_noasignados'))->setWarnings(false)->setPaper('letter');
        return $pdf->stream('Info.pdf');

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
        $cohorte = Cohorte::get();
        $depto = Departamento::where('id', '=', $iglesia->catalog_departamento_id)->get();
        $deptos = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        //$organizacion = Organization::get();
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $iglesia->id)->get();
        //plural

        $questionArray = $wizzaranswer->pluck('question_id')->toArray();

        $wizzarquestion = WizardQuestions::whereNotIn('id', $questionArray)->get();


        $grupo_iglesias=  $iglesia->iglesiagrupo;

        //$grupos= Grupo::whereNotIn('id', $iglesiaArray)->get();
  // dd(   $grupo_iglesias);

        $grupoArray =  $grupo_iglesias->pluck('id')->toArray();

        $grupos_noasignados = Grupo::whereNotIn('id', $grupoArray)->get();
        $grupos_asignados = Grupo::where('id', $grupoArray)->get();


       // return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias','grupos_noasignados'));

        //   dd($wizzarquestion);
        //where('id' ,'=', $wizzaranswer->question_id)->get();
        return view('catalog.iglesia.edit', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg',  'wizzaranswer', 'wizzarquestion','deptos',  'grupo_iglesias' , 'grupos_asignados','grupos_noasignados'));
    }

    public function update(Request $request, $id)
    {



        // dd($wizzaranswer);
        $organizations = Iglesia::findOrFail($id);

        $organizations->name = $request->name;
        $organizations->address = $request->address;

        $organizations->catalog_departamento_id = $request->catalog_departamento_id;
        $organizations->catalog_municipio_id = $request->catalog_municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status = $request->status;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = $destinationPath;
        $organizations->logo_name = $filename;
        $organizations->update();
        //  dd($organizations->id);
        //preguntas    if ( $wizzaranswer->question_id==$request->id) {        $wizzaranswer->answer=$request->answer;        $wizzaranswer->update();    }


        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }


    public function attach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //    dd( $wizzaranswer, $wizzaranswer->first() );
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->update();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }



    public function dettach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        $wizzarquestion = WizardQuestions::where('id', '=',  $request->question_id)->first();
        $wizzaranswer->delete();
        $wizzarquestion->delete();
        alert()->error('La Pregunta y Respuesta han sido eliminadas correctamente');
        return back();
    }



    public function attach_grupos(Request $request)
    {


        $grupoiglesia =iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->attach($request->grupo_id);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }



    public function dettach_grupos(Request $request)
    {

        $grupoiglesia =iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->detach($request->grupo_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();

    }











    //  dd($organizations->id);
    //preguntas    if ( $wizzaranswer->question_id==$request->id) {        $wizzaranswer->answer=$request->answer;        $wizzaranswer->update();    }


    public function add_preguntaresp(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request);
        // $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //  $wizzarquestion = WizardQuestions::where('id' ,'=',  $request->question_id)->first();
        // $time = Carbon::now('America/El_Salvador');
        $wizzaranswer = new ChurchQuestionWizard();

        //  $wizzarquestion->date_added = $time->toDateTimeString();

        $wizzaranswer->question_id = $request->question_id;
        $wizzaranswer->iglesia_id = $request->iglesia_id;
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->save();
        alert()->success('La Pregunta y Respuesta han sido agregado correctamente');
        return back();
    }


    public function actualizar_registro(Request $request)
    {

        session(['tab' => 3]);
        $count = WizardQuestions::get()->Count();


        $questions = WizardQuestions::where('active', '=', 1)->get();

        $iglesia = Iglesia::findOrFail($request->id);

        $iglesia->catalog_departamento_id = $request->departamento;
        $iglesia->update();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }

    public function back_page(Request $request)
    {

        session(['tab' => (session('tab') - 1)]);
        return back();
    }

    // public function actualizar_registro3(Request $request)
    // {

    //     $count = WizardQuestions::get()->Count();

    //     //  dd($request->username, $request->email);
    //     $questions = WizardQuestions::where('active', '=', 1)->get();

    //     $iglesia = Iglesia::findOrFail($request->id);

    //     /**aqui va ir el codigo de las preguntas */

    //     $respuestas = new ChurchQuestionWizard();
    //     $respuestas->question_id = $request->question_id;
    //     $respuestas->glesia_id = $request->$iglesia->id;
    //     if ($request->Answer == 1) {
    //         $respuestas->answer = 1;
    //     }
    //     if ($request->Answer == 0) {
    //         $respuestas->answer = 0;
    //     }

    //     $respuestas->save();
    //     alert()->success('El registro ha sido Ingresado satisfactoriamente');
    //     return view('catalog.iglesia.register_edit', compact('iglesia', 'tab', 'questions'));
    // }


    // public function actualizar_registro4(Request $request)
    // {

    //     $iglesia = Iglesia::findOrFail($request->id);

    //     $iglesia->address = $request->address;
    //     $iglesia->catalog_municipio_id = $request->catalog_municipio_id;
    //     $iglesia->phone_number = $request->phone_number;
    //     $iglesia->notes = $request->notes;
    //     $iglesia->contact_name = $request->contact_name;
    //     $iglesia->contact_job_title = $request->contact_job_title;
    //     $iglesia->contact_phone_number = $request->contact_phone_number;
    //     $iglesia->contact_phone_number_2 = $request->contact_phone_number_2;
    //     $iglesia->pastor_name = $request->pastor_name;
    //     $iglesia->pastor_phone_number = $request->pastor_phone_number;

    //     $iglesia->facebook = $request->facebook;
    //     $iglesia->website = $request->website;

    //     $iglesia->organization_type = $request->organization_type;
    //     $iglesia->status = $request->status;
    //     $iglesia->sede_id = $request->sede_id;
    //     $archivo = $request->file('logo_name');
    //     $filename = $archivo->getClientOriginalName();
    //     $path = $filename;
    //     $destinationPath = public_path('/images');
    //     $archivo->move($destinationPath, $path);
    //     $iglesia->logo_url = $destinationPath;
    //     $iglesia->logo_name = $filename;
    //     $iglesia->update();

    //     //guardar el usuario

    //     $usuarios = new user();
    //     $usuarios->name = $request->username;
    //     $usuarios->email = $request->email;
    //     $usuarios->password = Hash::make($request->password);
    //     $usuarios->save();
    //     alert()->success('El registro ha sido Ingresado satisfactoriamente');
    //     return redirect('/');
    //     /**fin del formulario  */
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iglesia = Iglesia::findOrFail($id);
        //dd($question);
        $iglesia->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function copiarImagen(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombreImagen = $imagen->getClientOriginalName();
            $carpetaDestino = public_path('images'); // Ruta de la carpeta de destino en el servidor
            $imagen->move($carpetaDestino, $nombreImagen);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function register_edit($id)
    {

        $iglesia = Iglesia::findOrFail($id);

        $departamento = null;
        if ($iglesia->departamento) {
            $departamento = Departamento::findOrFail($iglesia->catalog_departamento_id);
        }


        $questions = WizardQuestions::where('active', '=', 1)->get();

        foreach ($questions as $question) {
            $respuesta =  ChurchQuestionWizard::where('question_id', '=', $question->id)->where('iglesia_id', '=', $id)->first();
            if ($respuesta) {
                $question->answer = $respuesta->answer;
            } else {
                $question->answer = 1;
            }
        }

        return view('auth.register_edit', compact('iglesia', 'questions',  'departamento'));
    }


    public function registro_respuesta(Request $request)
    {
        $respuesta =  ChurchQuestionWizard::where('question_id', '=', $request->question_id)->where('iglesia_id', '=', $request->iglesia_id)->first();

        $pregunta = WizardQuestions::findOrFail($request->question_id);



        if ($respuesta) {
            $respuesta->answer = $request->answer;
            $respuesta->update();
        } else {
            $respuesta = new ChurchQuestionWizard();
            $respuesta->question_id = $request->question_id;
            $respuesta->iglesia_id = $request->iglesia_id;
            $respuesta->answer = $request->answer;
            $respuesta->save();
        }
        if ($request->answer != $pregunta->answer) {
            //dd($request->answer , $pregunta->answer);
            return view('auth.message');
        }

        alert()->success('El registro ha sido Ingresado satisfactoriamente');
        session(['tab' => (session('tab') + 1)]);
        return back();
    }

    public function registro_iglesia(Request $request)
    {

        $messages = [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya existe en la base de datos',
            'address.required' => 'La dirección  es requerida',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas ingresadas no coinsiden',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'address' => 'required',

        ], $messages);


        $iglesia = Iglesia::findOrFail($request->iglesia_id);




        $sede = DB::table('sede as s')
            ->join('cohorte as c', 'c.id', '=', 's.cohorte_id')
            ->where('c.region_id', $iglesia->departamento->region_id)
            ->select('s.id', DB::raw('(SELECT COUNT(*) FROM iglesia i WHERE i.sede_id = s.id) AS conteo'))
            ->having('conteo', '<', 5)
            ->first();

        if ($sede) {
            $sede_id = $sede->id;
        } else {
            $cohort = Cohorte::where('region_id', '=', $iglesia->departamento->region_id)
                ->select('id', DB::raw('(COUNT(*)) AS conteo'))
                ->groupBy('id')
                ->having('conteo', '<', 20)->first();

            if ($cohort) {
                $cohort_id = $cohort->id;
            } else {
                $cohort_new = new Cohorte();
                $cohort_new->nombre = "congregación";
                $cohort_new->region_id = $iglesia->departamento->region_id;
                $cohort_new->save();

                $cohort_id = $cohort_new->id;
            }

            $sede_new = new Sede();
            $sede_new->nombre =  "Sede";
            $sede_new->cohorte_id = $cohort_id;
            $sede_new->save();

           $sede_id = $sede_new->id;
        }



        if ($request->file('logo')) {
            $file = $request->file('logo');
            $id_file = uniqid();
            $file->move(public_path("img/"), $id_file . ' ' . $file->getClientOriginalName());
            $iglesia->logo = $id_file . ' ' . $file->getClientOriginalName();
            $iglesia->logo_url= $iglesia->logo;
                }

        $iglesia->sede_id = $sede_id;
        $iglesia->facebook = $request->facebook;
        $iglesia->website = $request->website;
        $iglesia->address = $request->address;
        $iglesia->save();


        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->save();

        $iglesia->users()->attach($usuario->id);


//agregando las respuestas de las preguntas del enrolamiento de la iglesia

       $time = Carbon::now('America/El_Salvador');
      $respuesta=new ChurchQuestionWizard();
      $wizzarquestion= WizardQuestions::where('active', '=', 1)->get();
      foreach ($wizzarquestion as $question) {
          $respuesta->question_id=$question->id;
          $respuesta->iglesia_id=$request->iglesia_id;
          $respuesta->answer=$request->answer;
          $respuesta->fecha= $time->toDateTimeString();
        }
//fin de  las respuestas de las preguntas del enrolamiento de la iglesia

        // Iniciar sesión con el nuevo usuario
      //  Auth::login($usuario);

        // Redirigir a la página de inicio o a donde desees después del registro e inicio de sesión
       // return redirect('/home');

       return view('confirma');
       return redirect('/confirma');


    }
}
