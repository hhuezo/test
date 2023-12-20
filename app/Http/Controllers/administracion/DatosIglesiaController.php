<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DatosIglesiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        try {
            $user   = User::findOrFail(auth()->user()->id);
            $iglesia = $user->user_has_iglesia->first();

            $participantes = $iglesia->participantes($iglesia->id);
          //  dd($participantes);
            $departamentos = Departamento::get();
            $grupos_iglesia = $iglesia->iglesia_has_grupo;


            $url =  url('/') . "/registro_participantes/" . $iglesia->id . '/';

            foreach ($grupos_iglesia as $obj) {
                $obj->conteo = $iglesia->countMembers($iglesia->id, $obj->id);
                $obj->codigo_qr = 'qrcodeiglesiagrupo' . $obj->id . '.png';
                QrCode::format('png')->size(200)->generate($url . '/' . $obj->id, public_path('img/qrcodeiglesiagrupo' . $obj->id . '.png'));
            }


            QrCode::format('png')->size(200)->generate($url . '0', public_path('img/qrcodeiglesia.png'));

            return view('datos_iglesia.index', compact(
                'departamentos',
                'iglesia',
                'grupos_iglesia',
                'participantes'
            ));
        } catch (Exception $e) {
            alert()->error('Error Datos No Coinciden');
            return back();
        }
    }

    public function download(){
        $pathtoFile = public_path().'/img/qrcodeiglesia.png';
        return response()->download($pathtoFile);
    }


    public function show($id)
    {

        $iglesia = Iglesia::findOrFail($id);
        $grupos = $iglesia->iglesia_has_grupo;
        return view('datos_iglesia.show', compact('iglesia',  'grupos'));
    }

    public function get_participantes($id)
    {

        $iglesia = Iglesia::findOrFail($id);

        $participantes = $iglesia->participantes($id)->where('status_id', '=', 2);
        $grupos = $iglesia->iglesia_has_grupo;

        return view('datos_iglesia.participantes_contenedor', compact('iglesia', 'participantes', 'grupos'));
    }

    public function set_estado(Request $request)
    {
        $member = Member::findOrFail($request->id);

        $response = ["val" => 0, "mensaje" => "Error"];
        if ($member) {
            if ($member->status_id == 2) {
                $member->status_id = 1;
            } else {
                $member->status_id = 2;
            }

            $member->update();

            $response = ["val" => 1, "mensaje" => "Registro modificado correctamente"];
        }
        return  $response;
    }
}
