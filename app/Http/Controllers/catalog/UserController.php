<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Users;

use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $usuarios = Users::get();

       return view('catalog.Iglesiauser.index', compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $usuario_iglesias=  $usuario->usuarioiglesia;
        $iglesiaArray =  $usuario_iglesias->pluck('id')->toArray();

        $iglesias_noasig = Iglesia::whereNotIn('id', $iglesiaArray)->get();


        return view('catalog.Iglesiauser.edit', compact('usuario','usuario_iglesias','iglesias_noasig'));
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
        //
    }

    public function attach_iglesiauser(Request $request)
    {

       // $useriglesia = Users::findOrFail($request->user_id);
       // $useriglesia->usuarioiglesia;
        //$iglesiauser=iglesia::where ('id','=' ,$useriglesia->usuarioiglesia);
       // $iglesiauser->usuarioiglesia()->attach( $iglesiauser->id);
        //dd( $iglesiauser);


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
