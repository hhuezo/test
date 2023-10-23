<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Departamento;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Municipio;
use App\Models\catalog\Organization;
use App\Models\catalog\OrganizationStatus;
use App\Models\catalog\Sede;
use App\Models\catalog\WizardQuestions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesia = Iglesia::get();

        return view('catalog.iglesia.index', compact('iglesia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::get();
        $depto = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();
        $estatuorg = OrganizationStatus::get();
        $organizacion = Organization::get();
        return view('catalog.iglesia.create', compact('sede', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion'));
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
            'name.required' => 'ingresar nombre de la organizacion',
        ];



        $request->validate([

            'name' => 'required',

        ], $messages);
        $organizations = new Iglesia();
        $organizations->name = $request->name;
        $organizations->address = $request->address;
        $organizations->catalog_departamento_id = $request->catalog_departamento_id;
        $organizations->catalog_municipio_id = $request->catalog_municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status = $request->status;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = $destinationPath;
        $organizations->logo_name = $filename;
        $organizations->save();
        alert()->success('El registro ha sido agregado correctamente');
        return back();
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

        $iglesia = Iglesia::findOrFail($id);
        $cohorte = Cohorte::get();
        $depto = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        $organizacion = Organization::get();
        return view('catalog.iglesia.edit', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion'));
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
        $organizations = Iglesia::findOrFail($id);

        $organizations->name = $request->name;
        $organizations->address = $request->address;

        $organizations->catalog_departamento_id = $request->catalog_departamento_id;
        $organizations->catalog_municipio_id = $request->catalog_municipio_id;
        $organizations->phone_number = $request->phone_number;
        $organizations->notes = $request->notes;
        $organizations->contact_name = $request->contact_name;
        $organizations->contact_job_title = $request->contact_job_title;
        $organizations->contact_phone_number = $request->contact_phone_number;
        $organizations->contact_phone_number_2 = $request->contact_phone_number_2;
        $organizations->pastor_name = $request->pastor_name;
        $organizations->pastor_phone_number = $request->pastor_phone_number;
        $organizations->facebook = $request->facebook;
        $organizations->website = $request->website;
        $organizations->personeria_juridica = $request->personeria_juridica;
        $organizations->organization_type = $request->organization_type;
        $organizations->status = $request->status;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = $destinationPath;
        $organizations->logo_name = $filename;
        $organizations->save();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }

    public function actualizar_registro(Request $request)
    {

     session(['tab' => 3]);
        $count = WizardQuestions::get()->Count();


        $questions = WizardQuestions::where('active', '=', 1)->get();


        $iglesia = Iglesia::findOrFail($request->id);
       // if ($request->valor == 2) {
            $iglesia->catalog_departamento_id = $request->departamento;
            $iglesia->update();
            alert()->success('El registro ha sido Modificado correctamente');
            return back();
         //   return view('catalog.iglesia.register_edit', compact('iglesia', 'tab', 'questions'));

       // }
    }

    public function actualizar_registro3(Request $request)
    {

        $count = WizardQuestions::get()->Count();

        //  dd($request->username, $request->email);
        $questions = WizardQuestions::where('active', '=', 1)->get();

        $iglesia = Iglesia::findOrFail($request->id);

            /**aqui va ir el codigo de las preguntas */

                $respuestas = new ChurchQuestionWizard();
                $respuestas->question_id = $request->question_id;
                $respuestas->glesia_id = $request->$iglesia->id;
                if ($request->Answer == 1) {
                    $respuestas->answer = 1;
                }
                if ($request->Answer== 0) {
                    $respuestas->answer = 0;
                }

                $respuestas->save();
                alert()->success('El registro ha sido Ingresado satisfactoriamente');
                return view('catalog.iglesia.register_edit', compact('iglesia', 'tab', 'questions'));



        }


        public function actualizar_registro4(Request $request)
    {

        $iglesia = Iglesia::findOrFail($request->id);

            $iglesia->address = $request->address;
            $iglesia->catalog_municipio_id = $request->catalog_municipio_id;
            $iglesia->phone_number = $request->phone_number;
            $iglesia->notes = $request->notes;
            $iglesia->contact_name = $request->contact_name;
            $iglesia->contact_job_title = $request->contact_job_title;
            $iglesia->contact_phone_number = $request->contact_phone_number;
            $iglesia->contact_phone_number_2 = $request->contact_phone_number_2;
            $iglesia->pastor_name = $request->pastor_name;
            $iglesia->pastor_phone_number = $request->pastor_phone_number;

            $iglesia->facebook = $request->facebook;
            $iglesia->website = $request->website;

            $iglesia->organization_type = $request->organization_type;
            $iglesia->status = $request->status;
            $iglesia->sede_id = $request->sede_id;
            $archivo = $request->file('logo_name');
            $filename = $archivo->getClientOriginalName();
            $path = $filename;
            $destinationPath = public_path('/images');
            $archivo->move($destinationPath, $path);
            $iglesia->logo_url = $destinationPath;
            $iglesia->logo_name = $filename;
            $iglesia->update();

            //guardar el usuario

            $usuarios = new user();
            $usuarios->name = $request->username;
            $usuarios->email = $request->email;
            $usuarios->password = Hash::make($request->password);
            $usuarios->save();
            alert()->success('El registro ha sido Ingresado satisfactoriamente');
            return redirect('/');
            /**fin del formulario  */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iglesia = Iglesia::findOrFail($id);
        //dd($question);
        $iglesia->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function copiarImagen(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombreImagen = $imagen->getClientOriginalName();
            $carpetaDestino = public_path('images'); // Ruta de la carpeta de destino en el servidor
            $imagen->move($carpetaDestino, $nombreImagen);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function register_edit($id)
    {

        $iglesia = Iglesia::findOrFail($id);
        $questions = WizardQuestions::where('active', '=', 1)->get();

        return view('catalog.iglesia.register_edit', compact('iglesia', 'questions'));
    }




}
