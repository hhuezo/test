<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\administracion\ConfiguracionCorreos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ConfiguracionCorreosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $configcorreo = ConfiguracionCorreos::get()->first();
       // dd( $configcorreo );
        config([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.host' => $configcorreo->smtp_host,
            'mail.mailers.smtp.port' => $configcorreo->smtp_port,
            'mail.mailers.smtp.username' => $configcorreo->smtp_username,
            'mail.mailers.smtp.password' => $configcorreo->smtp_password,
            'mail.from.address' => $configcorreo->from_address,
            'mail.mailers.smtp.encryption' => $configcorreo->smtp_encryption,
            'mail.from.name' => $configcorreo->smtp_from_name,
        ]);

        $recipientEmail = "hugo.alex.huezo@gmail.com";
        $subject = 'Correo de prueba';
        $content = "¡Este es un correo de prueba!";

        Mail::to($recipientEmail)->send(new SendMail($subject, $content));

  


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

        $time = Carbon::now('America/El_Salvador');
        $email =ConfiguracionCorreos::findOrFail($id);
        $email->smtp_host= $request->smtp_host;
        $email->smtp_port = $request->smtp_port;
        $email-> smtp_username = $request->smtp_username;
        $email->smtp_password =$request-> smtp_password;
        $email-> from_address = $request->from_address;
        //$email->UsuarioCreacion= $request->UsuarioCreacion;
        //$email->UsuarioModificacion = $request-> UsuarioModificacion;
        $email->CreatedAt  = $time->toDateTimeString();
        $email->UpdateAt = $time->toDateTimeString();
        $email->smtp_encryption  =$request-> smtp_encryption ;
        $email->smtp_from_name = $request->smtp_from_name;
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
