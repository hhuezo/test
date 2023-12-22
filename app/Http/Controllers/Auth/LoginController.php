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

    public function login(Request $request)
    {
        // dd($request->email, Hash::make($request->password), $request->password,'$2y$10$hk800y/5ljFzc3fji4D.iOmqhVU3yDmCTqOe5T7CISixTAoYA8scq');
        if ($request->email) {
            $user = User::where('email', '=', $request->email)->first();
            // dd($user);
            Auth::login($user);
        } elseif ($request->document_number) {
            $user = Member::where('document_number', '=', $request->document_number)->first();

            if ($user && Auth::attempt(['id' => $user->users_id, 'password' => $request->password])) {
                // La autenticación fue exitosa
                $usuario = User::findOrFail($user->users_id);
                // dd($usuario);
                Auth::login($usuario);
                return response()->json(['message' => 'Autenticación exitosa'], 200);
            } else {
                // La autenticación falló
                Auth::logout();
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
        } elseif ($request->phone) {
            $user = Member::where('cell_phone_number', '=', $request->phone)->first();

            if ($user && Auth::attempt(['id' => $user->users_id, 'password' => $request->password])) {
                // La autenticación fue exitosa
                $usuario = User::findOrFail($user->users_id);
                // dd($usuario);
                Auth::login($usuario);
                return response()->json(['message' => 'Autenticación exitosa'], 200);
            } else {
                // La autenticación falló
                Auth::logout();
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }
        }
    }
}
