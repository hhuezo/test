<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

   // public function __construct()    {        $this->middleware('auth');    }

    public function index()
    {

        $usuarios = User::get();
        // $user = User::findOrFail(auth()->user()->id);
        // $user
        // dd($user);

       return view('seguridad.user.index', compact('usuarios'));

    }

    public function create()
    {

        $usuarios = User::get();

        return view('seguridad.user.create', compact('usuarios'));
    }


    public function store(Request $request)
    {

        $messages = [
            'name' => 'El nombre es un valor requerido',
            'password.required' => 'la clave es un valor requerido',
            'email' => 'El Correo electronico es un valor requerido',


        ];



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
                    ], $messages);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->save();
        alert()->success('se han sido Agragado correctamente');
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {


       $usuarios = User::findOrFail($id);
       $roles=$usuarios->user_rol;

       $rolArray =  $roles->pluck('id')->toArray();

     $rol_no_asignados = Role::whereNotIn('id', $rolArray)->get();



       return view('seguridad.user.edit', compact('usuarios','roles','rol_no_asignados'));

    }

    public function update(Request $request, $id)
    {
        $messages = [
            'password.required' => 'la clave es un valor requerido',
                ];



        $request->validate([
            'password' => ['required', 'string', 'max:255'],

                    ], $messages);


        $usuarios = user::findOrFail($id);
        $usuarios->name = $request->name;
        $usuarios->email = $request->email;
        $usuarios->password = Hash::make($request->password);
        $usuarios->status = 1;
        $usuarios->update();
        alert()->success('se han sido Actualizado correctamente');
        return back();

    }

    public function  attach_roles(Request $request)
    {
      $user=User::findOrFail($request->model_id);
      $roles =Role::findOrFail($request->rol_id);
      $user->assignRole($roles->name);
     // $roles->user_has_role()->attach($request->model_id);
        alert()->success('se han sido Agregado correctamente');
        return back();

    }

    public function  dettach_roles(Request $request)
    {

    $roles =Role::findOrFail($request->role_id);
    $roles->user_has_role()->detach($request->model_id);
    alert()->error('El registro ha sido eliminado correctamente');
    return back();
}

    public function destroy($id)
    {
      //
    }
}
