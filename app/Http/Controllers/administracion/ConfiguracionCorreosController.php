<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\administracion\ConfiguracionCorreos;
use App\Models\catalog\Iglesia;
use Illuminate\Http\Request;

class ConfiguracionCorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configcorreo = ConfiguracionCorreos::get()->first();

        return view('administracion.configuracion_correos.index', compact('configcorreo'));
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
        //
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

        $email =ConfiguracionCorreos::findOrFail($id);
        $email->smtp_host= $request->smtp_host;
        $email->smtp_port = $request->smtp_port;
        $email-> smtp_username = $request->smtp_username;
        $email->smtp_password =$request-> smtp_password;
        $email-> from_address = $request->from_address;
        $email->UsuarioCreacion= $request->UsuarioCreacion;
        $email->UsuarioModificacion = $request-> UsuarioModificacion;
        $email->CreatedAt  =$request->  CreatedAt ;
        $email->UpdateAt = $request->UpdateAt;
        $email-> smtp_encryption  =$request-> smtp_encryption ;
        $email-> smtp_from_name = $request->smtp_from_name;
        $email->update();
        alert()->success('se han sido Actualizado correctamente');
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
