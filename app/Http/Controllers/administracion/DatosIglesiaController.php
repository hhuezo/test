<?php

namespace App\Http\Controllers\administracion;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DatosIglesiaController extends Controller
{

    public function index(Request $request)
    {
        try {
            $user   = User::findOrFail(auth()->user()->id);
            $iglesia = $user->user_has_iglesia->first();

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
                'grupos_iglesia'
            ));
        } catch (Exception $e) {
            alert()->error('Error Datos No Coinciden');
            return back();
        }
    }
}
