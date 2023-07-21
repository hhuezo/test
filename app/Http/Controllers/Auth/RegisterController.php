<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Organization;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
            'password.confirmed' => 'Las claves no coinciden.',
            'password.min' => 'La Contraseña debe tener un minimo de 8 caracteres',
            'name_organization.required' => 'El Nombre de la organización es un valor requerido',
            'phone_number.required' => 'El Numero de telefono es un valor requerido',
            'address' => 'La dirección es un valor requerido',
            'contact_name.required' => 'El Contacto es un valor requerido',
            'cargo_contacto_principal.required' => 'El cargo del contacto principal es un valor requerido',
            'contact_phone_number.required' => 'El número de telefono del contacto es un valor requerido',
            'contacto_secundario.required' => 'El Contacto secundario es un valor requerido',
            'cargo_contacto_secundario.required' => 'El Cargo del contacto secundario es un valor requerido',
            'telefono_secundario.required' => 'El Numero de telefono del contacto secundario es un valor requerido'
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
        // try {
        //     DB::beginTransaction();
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->status = 0;
            $user->save();

            //asign role
            $user->assignRole('facilitator');

            $organization = new Organization();
            //$organization->user_id = $user->id;
            $organization->name = $data['name_organization'];
            $organization->address = $data['address'];
            $organization->phone_number = $data['phone_number'];
            $organization->notes = $data['notes'];
            $organization->contact_name = $data['contact_name'];
            $organization->contact_job_title = $data['contact_job_title'];
            $organization->contact_phone_number = $data['contact_phone_number'];
            $organization->contact_phone_number_2 = $data['contact_phone_number_2'];
            $organization->secondary_contact_name = $data['secondary_contact_name'];
            $organization->secondary_contact_job_title = $data['secondary_contact_job_title'];
            $organization->secondary_contact_phone_number = $data['secondary_contact_phone_number'];
            $organization->secondary_contact_phone_number_2 = $data['secondary_contact_phone_number_2'];
            $organization->status = 1;
            $organization->save();

            $user->organization()->attach($organization->id);

            //Envio de correo usando metodo sendMail de MailController
            $objeto = new  MailController();
            $email = $data['email'];
            //$email = $request->get('email');
            $subject = "Notificación: Datos registrados correctamente";
            $content = "Sus datos han sido registrados, nuestro equipo revisará la información y le notificará cuando sean aprobados";
            $result = $objeto->sendMail($email, $subject, $content);

            return $user;
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors(collect($e->getMessage()));
        // }
    }
}
