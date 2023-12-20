<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user->hasRole('participante') == true) {

            return redirect('administracion/iglesia_plan_estudio/control_participante');

        } else {
            return view('test');

            if (auth()->user()->status == 0) {
                return view('home2');
            }
            if ($user->hasRole('member')) {
                return redirect('course');
            }
        }

    }

    public function test()
    {
        return view('test');
    }


    public function confirmacion()
    {
        dd('redireccionado');
        return view('confirma');
    }
}
