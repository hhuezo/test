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
        if (auth()->user()->status == 0) {
            return view('home2');
        }

        //role members
        $user = User::findOrFail(auth()->user()->id);
        if ($user->hasRole('member')) {
            return redirect('course');
        }
        return view('home');
    }

    public function test()
    {
        return view('test');
    }
}
