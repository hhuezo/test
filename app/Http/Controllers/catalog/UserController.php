<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\Users;
 use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $members = Member::where('status_id','=',1)->get();
        $usuarios =  Users::get();


        return view('catalog.iglesiauser.index', compact('usuarios','members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $usuarios = Users::get();

        return view('catalog.iglesiauser.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'ingresar la pregunta',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $usuario = new Users();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;

        $usuario->password =  Hash::make($request->password)    ;





        $usuario->save();
        alert()->success('El registro ha sido agregado correctamente');
        //return redirect('catalog/region');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $usuario = Users::findOrFail($id);

        return view('catalog.iglesiauser.edit', compact('usuario' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nombre.required' => 'ingresar la pregunta',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $usuario =  Users::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if($request->password !=""){
            $usuario->password =  Hash::make($request->password)    ;
        }


      //  $usuario->password =  Hash::make($request->password);;
        $usuario->update();
        alert()->success('El registro ha sido modificado correctamente');
    }

    public function attach_iglesiauser(Request $request)
    {




       $useriglesia =Users::findOrFail($request->user_id);
       $useriglesia->usuarioiglesia()->attach($request->iglesia_id);
       $useriglesia->save();
        alert()->success('El registro ha sido agregada correctamente');
        return back();
    }



    public function dettach_iglesiauser(Request $request)
    {

        $useriglesia =Iglesia::findOrFail($request->iglesia_id);
        $useriglesia->usuarioiglesia()->detach($request->user_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();
       }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//
    }
}
