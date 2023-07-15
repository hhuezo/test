<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organizacion;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected function validator(array $data)
    {
        $messages = [
            'name.required' => 'El nombre es un valor requerido',
            'email.required' => 'El Correo electronico es un valor requerido',
            'email.unique' => 'El Correo ingresado ya existe',
            'password.required' => 'La Contraseña es un valor obligatorio',
            'password.confirmed' => 'Las Claves no coinciden.',
            'password.min' => 'La Contraseña debe tener un minimo de 8 caracteres',
            'nombre_organizacion.required' => 'El Nombre de la empresa es un valor requerido',
            'telefono_organizacion.required' => 'El Numero de telefono es un valor requerido',
            // 'nota' =>
            'contacto_principal.required' => 'El Contacto principal es un valor requerido',
            'cargo_contacto_principal.required' => 'El Cargo del contacto principal es un valor requerido',
            'telefono_contacto_principal.required' => 'El Numero de telefono del Contacto principal es un valor requerido',
            'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nombre_organizacion' => ['required', 'string', 'max:255'],
            'telefono_organizacion' => ['required', 'string', 'max:9'],
            // 'nota' => [],
            'contacto_principal' => ['required', 'string', 'max:255'],
            'cargo_contacto_principal' => ['required', 'string', 'max:255'],
            'telefono_contacto_principal' => ['required', 'string', 'max:9'],
            'contacto_secundario' => ['required', 'string', 'max:255'],
            'cargo_contacto_secundario' => ['required', 'string', 'max:255'],
            'telefono_secundario' => ['required', 'string', 'max:9'],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        $organizacion = new Organizacion();
        $organizacion->user_id = $user->id;
        $organizacion->nombre= $data['nombre_organizacion'];
        $organizacion->telefono= $data['telefono_organizacion'];
        $organizacion->nota= $data['nota'];
        $organizacion->contacto_principal= $data['contacto_principal'];
        $organizacion->cargo_contacto_principal = $data['cargo_contacto_principal'];
        $organizacion->telefono_contacto_principal = $data['telefono_contacto_principal'];
        $organizacion->nombre_contacto_secundario = $data['contacto_secundario'];
        $organizacion->cargo_contacto_secundario = $data['cargo_contacto_secundario'];
        $organizacion->telefono_contacto_secundario = $data['telefono_secundario'] ;
        $organizacion->estado_organizacion_id = 1;
        $organizacion->save();

        return $user;
    }
}
