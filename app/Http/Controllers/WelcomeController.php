<?php

namespace App\Http\Controllers;

use App\Models\catalog\Departamento;

use App\Models\catalog\Iglesia;
use App\Models\catalog\Member; //as CatalogMember;

use App\Models\catalog\Municipio;

//use App\Models\Member;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //   $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.login');
    }


    public function store_member(Request $request)
    {

        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'last_name.required' => 'El apellido es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
            'document_number.required' => 'El número de documento es un valor requerido',
            'phone_number.required' => 'El número de telefono es un valor requerido',
            'phone_number.regex' => 'El número de teléfono no es válido',
            'address.required' => 'La dirección es un valor requerido',
            'document_number.required' => 'El número de documento es un valor requerido',
            'document_number.min' => 'El número de documento no es válido',
            'document_number.regex' => 'El número de documento no es válido',
            'birthdate.before' => 'El grupo seleccionado no es válido',
        ];



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
            'address' => ['required', 'string', 'max:255'],
        ], $messages);

        if ($request->grupo_id != 1) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone_number' => ['required', 'string', 'max:9'],
                'address' => ['required', 'string', 'max:255'],
                'document_number' => ['required', 'string', 'regex:/^\d{8}-\d$/'],
                'phone_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
            ], $messages);
        }



         try {
        // Iniciar la transacción
        DB::beginTransaction();

        $fechaNacimientoObj = new DateTime($request->birthdate);
        $fechaActual = new DateTime();
        $edad = $fechaNacimientoObj->diff($fechaActual);
        $edad->y;

        if ($edad->y >= 18  &&  $request->grupo_id == 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }


        if ($edad->y < 18  &&  $request->grupo_id != 1) {
            throw ValidationException::withMessages(['grupo_id' => ['El grupo no es válido']]);
        }


        $user = new User();
        $user->name = $request->name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();


        //ASIGNANDO IGLESIA
        $user->user_has_iglesia()->attach($request->iglesia_id);



        //ASIGNANDO ROL
        $user->assignRole('participante');


        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->departamento_id = $request->departamento_id;
        $member->municipio_id = $request->municipio_id;
        $member->status_id = 1;
        $member->users_id = $user->id;
        $member->save();

        $member->member_has_group()->attach($request->grupo_id);


        alert()->success('Participante registrado correctamente');
        return redirect('/login');
         } catch (\Exception $e) {
            DB::rollBack();
            alert()->error($e->getMessage());
            return back();
            dd($e->getMessage());
            return redirect()->route('ruta_error')->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function get_municipio($id)
    {
        return  Municipio::where('departamento_id', '=', $id)->get();
    }

    public function get_departamento($id)
    {
        $iglesia = Iglesia::findorfail($id);
        $departamento = Departamento::findorfail($iglesia->catalog_departamento_id);
        //dd($departamento->nombre);
        return $departamento;
    }

    public function get_map($dep)
    {
        return view('map', compact('dep'));
    }

    public function store_file(Request $request)
    {
        $image = $request->file('file_document');
        $imageName = time() . rand(1, 100) . '.' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        return response()->json(['success' => $imageName]);
    }

    public function get_dep($id)
    {
        $dep = Departamento::where('abbrev', '=', $id)->first();

        if ($dep) {
            // Si encontramos un departamento, devolvemos la respuesta en formato JSON
            return response()->json($dep);
        } else {
            // Si no se encuentra el departamento, puedes devolver un mensaje o lo que sea necesario
            return response()->json(['error' => 'Departamento no encontrado'], 404);
        }
        // Si también necesitas la vista, puedes descomentar la línea siguiente
        // return view('map', compact('dep'));
    }


    public function attach_new_member(Request $request)
    {



        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'last_name.required' => 'El apellido es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
            'document_number.required' => 'El número de documento es un valor requerido',
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido'
            //'organization_id.required' => 'La organización es requerida',
            //'cargo_contacto_principal.required' => 'El cargo del contacto principal es un valor requerido',
            //'contact_phone_number.required' => 'El número de telefono del contacto es un valor requerido',
            //'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            //'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            //'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
        ];



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'document_number' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],
            //'organization_id' => ['required'],
        ], $messages);



        $user = new User();
        $user->name = $request->name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->assignRole('participante');

        $user->save();

        //asign role

        $iglesia = Iglesia::findorfail($request->iglesia_id);
        $deptos = Departamento::findorfail($iglesia->catalog_departamento_id);

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        $member->document_number = $request->document_number;
        $member->catalog_gender_id = $request->genero;
        $member->email = $request->email;
        $member->cell_phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = (int)$request->iglesia_id;
        $member->status_id = 1;
        $member->users_id = $user->id;
        $member->state_id =   $deptos->id;
        if ($request->get('is_pastor') == 'on') {
            $member->is_pastor = 1;   // si es pastor
        } else {
            $member->is_pastor = 0;
        }
        //   $user->assignRole('Participante');
        // $member->municipio_id = $user->Municipio;
        $member->save();

        $GroupPerchuchPlan = GroupPerchuchPlan::where('iglesia_id', '=', $request->iglesia_id)->where('group_id', '=', $request->grupo_id)->first();

        $GroupPerchuchPlan->miembro_grupo()->attach($member->id);

        alert()->success('Miembro registrado correctamente');
        return back();
        //return redirect('/login');

    }


    public function registro_participantes($id,$grupo)
    {
        $iglesia = Iglesia::findorfail($id);
        if($grupo == 0)
        {
            $grupos = $iglesia->iglesia_has_grupo;
        }
        else{
            $grupos = Grupo::where('id','=',$grupo)->get();
        }

        $departamentos = Departamento::get();
        return view('catalog/member/register_member', compact('iglesia', 'departamentos', 'grupos','grupo'));
    }
}
