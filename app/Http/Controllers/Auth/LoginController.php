<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\catalog\Member;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request )
    {
        if ($request->document_number || $request->phone) {

            $field = $request->document_number ? 'document_number' : 'cell_phone_number';
            $input = $request->document_number ? $request->document_number : $request->phone ;

            $user = Member::where($field, '=', $input)->first();



            if ($user && Auth::attempt(['id' => $user->users_id, 'password' => $request->password])) {
                // Autenticación exitosa
                $usuario = User::findOrFail($user->users_id);
                Auth::login($usuario);
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                // Autenticación fallida
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas']);
            }
        } elseif ($request->email) {
            // Inicio de sesión con correo electrónico
            $user = User::where('email', '=', $request->email)->first();

            if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password])) {
                // Autenticación exitosa
                Auth::login($user);
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                // Autenticación fallida
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Credenciales incorrectas']);
            }
        } else {
            // Manejar el caso en el que no se proporciona ni document_number ni phone ni email
            return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
        }


    }
}
