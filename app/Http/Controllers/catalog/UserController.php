<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\Users;
 use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


       // $members = Member::where('status_id','=',1)->get();
        $usuarios =  User::where('status','=',1)->get();;


         $miembros_iglesia =  DB::select("select  q.id idusuario, q.name_member as nombre  , i.name iglesia
         from iglesia i
         join member q on
         i.id =q.organization_id");



        return view('catalog.iglesiauser.index', compact('usuarios','miembros_iglesia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $usuarios = User::get();

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

        $usuario = new User();
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


        $member = Member::findOrFail($id);
        $iglesia=Iglesia::get();
        $grupo=Grupo::get();




        return view('catalog.iglesiauser.edit', compact('member','iglesia','grupo' ));
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
            'nombre.required' => 'ingresar nombre',
        ];



        $request->validate([

            'nombre' => 'required',

        ], $messages);

        $usuario =  User::findOrFail($id);
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




       $useriglesia =User::findOrFail($request->user_id);
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
