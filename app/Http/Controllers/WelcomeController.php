<?php

namespace App\Http\Controllers;

use App\Models\catalog\Departamento;
use App\Models\catalog\Municipio;
use App\Models\Member;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
       // return view('welcome');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function register_member()
    {
        $departamentos = Departamento::get();
        $municipios = Municipio::where('departamento_id', '=', 1)->get();
        $organizations = Organization::get();
        return view('auth.register_member', compact('departamentos', 'municipios', 'organizations'));
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
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address.required' => 'La dirección es un valor requerido',
            //'organization_id.required' => 'La organización es requerida',
            'cargo_contacto_principal.required' => 'El cargo del contacto principal es un valor requerido',
            'contact_phone_number.required' => 'El número de telefono del contacto es un valor requerido',
            'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
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
        $user->name = $request->name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();

        //asign role
        $user->assignRole('member');

        $member = new Member();
        $member->name_member = $request->name;
        $member->lastname_member = $request->last_name;
        $member->birthdate = $request->birthdate;
        //$member->document_number = $request->document_number;
        $member->email = $request->email;
        $member->cell_phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->about_me = $request->about_me;
        $member->organization_id = $request->organization_id;
        $member->status = 1;
        $member->users_id = $user->id;
        $member->municipio_id = $user->Municipio;
        $member->save();

        //Envio de correo usando metodo sendMail de MailController
        $objeto = new  MailController();
        $email = $request->email;
        //$email = $request->get('email');
        $subject = "Notificación: Datos registrados correctamente";
        $content = "Sus datos han sido registrados, nuestro equipo revisará la información y le notificará cuando sean aprobados";
        $result = $objeto->sendMail($email, $subject, $content);
        alert()->success('Usuario registrado correctamente');
        return redirect('/login');
    }

    public function get_municipio($id)
    {
        return  Municipio::where('departamento_id', '=', $id)->get();
    }


    public function get_map($dep)
    {
        return view('map', compact('dep'));
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


    public function edit($id)
    {
        //
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
