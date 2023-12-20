<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Departamento;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Sede;
use App\Models\catalog\WizardQuestions;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function index(){

        $questions = WizardQuestions::where('active', 1)->get();
        return view('auth.register', compact('questions'));
     }


    protected function validator(array $data)
    {

        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El Correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La Contraseña debe tener un minimo de 8 caracteres',
            'name_organization.required' => 'El Nombre de la organización es un valor requerido',
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address' => 'La dirección es un valor requerido',
            'contact_name.required' => 'El Contacto es un valor requerido',
        ];

        if (Session::get('locale') && Session::get('locale') == 'en') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'name_organization' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:9'],
                'address' => ['required', 'string', 'max:255'],
                'contact_name' => ['required', 'string', 'max:255'],
                'contact_phone_number' => ['required', 'string', 'max:9'],
            ]);
        } else {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'name_organization' => ['required', 'string', 'max:255'],
                'phone_number' => ['required', 'string', 'max:9'],
                'address' => ['required', 'string', 'max:255'],
                'contact_name' => ['required', 'string', 'max:255'],
                'contact_phone_number' => ['required', 'string', 'max:9'],
            ], $messages);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
    }

    public function register(Request $request)
    {

        $messages = [
            'nombre.required' => 'El nombre es requerido no dejar espacios en blanco',
          //  'pastor_phone_number' => 'El fomato de telefono de contacto 2 no es válido',
        ];

        $request->validate([
            'nombre' => 'required',



        ], $messages);


        $iglesia  = new Iglesia();
        $iglesia->name = $request->nombre;
        $iglesia->save();
        session(['tab' => 2]);

        return redirect('register_edit/'.$iglesia->id);
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
            'password.confirmed' => 'Las contraseñas ingresadas no coinciden',
            'pastor_name.required' => 'El nombre del pastor es requerido',
          //  'pastor_phone_number' => 'El fomato de telefono de contacto 2 no es válido',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'address' => 'required',
            'pastor_name' => 'required',
           // 'pastor_phone_number' => 'regex:/^\d{4}-\d{4}$/',

        ], $messages);


        $iglesia = Iglesia::findOrFail($request->iglesia_id);

        // $sede = DB::table('sede as s')
        //     ->join('cohorte as c', 'c.id', '=', 's.cohorte_id')
        //     ->where('c.region_id', $iglesia->departamento->region_id)
        //     ->select('s.id', DB::raw('(SELECT COUNT(*) FROM iglesia i WHERE i.sede_id = s.id) AS conteo'))
        //     ->having('conteo', '<', 5)
        //     ->first();

        // if ($sede) {
        //     $sede_id = $sede->id;
        // } else {
        //     $cohort = Cohorte::where('region_id', '=', $iglesia->departamento->region_id)
        //         ->select('id', DB::raw('(COUNT(*)) AS conteo'))
        //         ->groupBy('id')
        //         ->having('conteo', '<', 20)->first();

        //     if ($cohort) {
        //         $cohort_id = $cohort->id;
        //     } else {
        //         $cohort_new = new Cohorte();
        //         $cohort_new->nombre = "congregación";
        //         $cohort_new->region_id = $iglesia->departamento->region_id;
        //         $cohort_new->save();

        //         $cohort_id = $cohort_new->id;
        //     }

        //     $sede_new = new Sede();
        //     $sede_new->nombre =  "Sede";
        //     $sede_new->cohorte_id = $cohort_id;
        //     $sede_new->save();

        //     $sede_id = $sede_new->id;
        // }



        // if ($request->file('logo')) {
        //     $file = $request->file('logo');
        //     $id_file = uniqid();
        //     $file->move(public_path("images/"), $id_file . ' ' . $file->getClientOriginalName());
        //     $iglesia->logo = $id_file . ' ' . $file->getClientOriginalName();
        //     $iglesia->logo_url = "./images/";
        // }

      //  $iglesia->sede_id = $sede_id;
        $iglesia->facebook = $request->facebook;
        $iglesia->website = $request->website;
        $iglesia->address = $request->address;
        $iglesia->status_id = 1;
        $iglesia->contact_name = $request->name;
        $iglesia->pastor_phone_number = $request->pastor_phone_number;
        $iglesia->pastor_name = $request->pastor_name;
        $iglesia->save();   //actualizar iglesia


        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password =  Hash::make($request->password);
        $usuario->assignRole("encargado");
        $usuario->save();

        $grupos =  Grupo::get();

        foreach ($grupos as $grupo) {
            $iglesia->iglesia_has_grupo()->attach($grupo->id);
        };

        $iglesia->users()->attach($usuario->id);


        return view('confirma');
    }

    public function back_page(Request $request)
    {
        session(['tab' => (session('tab') - 1)]);
        return back();
    }

}
