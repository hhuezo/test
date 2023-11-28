<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\ChurchQuestionWizard;
use App\Models\catalog\Cohorte;
use App\Models\catalog\Departamento;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Municipio;
use App\Models\catalog\Organization;
use App\Models\catalog\OrganizationStatus;
use App\Models\catalog\Sede;
use App\Models\catalog\WizardQuestions;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class IglesiaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $iglesia = Iglesia::get();
        $estatuorg = OrganizationStatus::get();
        return view('catalog.iglesia.index', compact('iglesia', 'estatuorg'));
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
        return view('catalog.iglesia.create', compact('sede', 'depto', 'municipio', 'sede', 'estatuorg',));
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
        $organizations->status_id = 1;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = "./images";
        $organizations->logo = $filename;
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



        $userfaclitator = User::get();


        $iglesia = Iglesia::findOrFail($id);
        $cohorte = Cohorte::get();
        $depto = Departamento::where('id', '=', $iglesia->catalog_departamento_id)->get();
        $deptos = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        $organizacion = Organization::get();
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $iglesia->id)->get();
        //plural

        $questionArray = $wizzaranswer->pluck('question_id')->toArray();

        $wizzarquestion = WizardQuestions::whereNotIn('id', $questionArray)->get();


        $grupo_iglesias =  $iglesia->iglesia_grupo;

        //$grupos= Grupo::whereNotIn('id', $iglesiaArray)->get();
        //dd(   $grupo_iglesias);

        $grupoArray =  $grupo_iglesias->pluck('id')->toArray();

        $grupos_noasignados = Grupo::whereNotIn('id', $grupoArray)->get();
        $grupos_asignados = Grupo::where('id', $grupoArray)->get();


        // return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias','grupos_noasignados'));

        //   dd($wizzarquestion);
        //where('id' ,'=', $wizzaranswer->question_id)->get();
        //return view('catalog.iglesia.show', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion', 'wizzaranswer', 'wizzarquestion','deptos',  'grupo_iglesias' , 'grupos_asignados','grupos_noasignados'));






        //generando QR
        // QrCode::format('png')->size(200)->generate( (string)$iglesia->id, public_path('img/qrcode.png'));





        $pdf = \PDF::loadView('catalog.iglesia.show', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg', 'organizacion', 'wizzaranswer', 'wizzarquestion', 'deptos',  'grupo_iglesias', 'grupos_asignados', 'grupos_noasignados'))->setWarnings(false)->setPaper('letter');
        return $pdf->stream('Info.pdf');
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
        $depto = Departamento::where('id', '=', $iglesia->catalog_departamento_id)->get();
        $deptos = Departamento::get();
        $municipio = Municipio::get();
        $sede = Sede::get();

        $estatuorg = OrganizationStatus::get();
        //$organizacion = Organization::get();
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $iglesia->id)->get();
        //plural

        $questionArray = $wizzaranswer->pluck('question_id')->toArray();

        $wizzarquestion = WizardQuestions::whereNotIn('id', $questionArray)->where('active', '=', 1)->get();
        //dd($wizzarquestion);


        $grupo_iglesias =  $iglesia->iglesia_has_grupo;

        //$grupos= Grupo::whereNotIn('id', $iglesiaArray)->get();
        // dd(   $grupo_iglesias);

        $grupoArray =  $grupo_iglesias->pluck('id')->toArray();

        $grupos_noasignados = Grupo::whereNotIn('id', $grupoArray)->get();
        $grupos_asignados = Grupo::where('id', $grupoArray)->get();


        // return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias','grupos_noasignados'));

        //   dd($wizzarquestion);
        //where('id' ,'=', $wizzaranswer->question_id)->get();
        return view('catalog.iglesia.edit', compact('iglesia', 'cohorte', 'depto', 'municipio', 'sede', 'estatuorg',  'wizzaranswer', 'wizzarquestion', 'deptos',  'grupo_iglesias', 'grupos_asignados', 'grupos_noasignados'));
    }

    public function update(Request $request, $id)
    {



        // dd($wizzaranswer);
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
        $organizations->status_id = $request->status_id;
        $organizations->sede_id = $request->sede_id;
        $archivo = $request->file('logo_name');
        $filename = $archivo->getClientOriginalName();
        $path = $filename;
        $destinationPath = public_path('/images');
        $archivo->move($destinationPath, $path);
        $organizations->logo_url = "./images"; /// $destinationPath;
        $organizations->logo = $filename;
        $organizations->update();
        //  dd($organizations->id);
        //preguntas    if ( $wizzaranswer->question_id==$request->id) {        $wizzaranswer->answer=$request->answer;        $wizzaranswer->update();    }


        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }


    public function attach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //    dd( $wizzaranswer, $wizzaranswer->first() );
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->update();
        alert()->success('El registro ha sido Modificado correctamente');
        return back();
    }



    public function dettach_preguntas(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request->answer);
        $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        $wizzarquestion = WizardQuestions::where('id', '=',  $request->question_id)->first();
        $wizzaranswer->delete();
        // $wizzarquestion->delete();
        alert()->error('La  Respuesta han sido eliminadas correctamente');
        return back();
    }



    public function attach_grupos(Request $request)
    {

        // dd($request->group_id,$request->iglesia_id);
        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesia_grupo()->attach($request->group_id);
        alert()->success('El registro ha sido agregado correctamente');
        return back();
    }



    public function dettach_grupos(Request $request)
    {

        $grupoiglesia = iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->detach($request->group_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();
    }


    public function modificar_estado(Request $request)
    {
        // dd($request->status_id,$request->iglesia_id);

        $iglesia = iglesia::findOrFail($request->iglesia_id);
        $iglesia->status_id = $request->status_id;
        $iglesia->update();
        alert()->success('El Estado ha sido Modificado correctamente');
        return back();
    }










    //  dd($organizations->id);
    //preguntas    if ( $wizzaranswer->question_id==$request->id) {        $wizzaranswer->answer=$request->answer;        $wizzaranswer->update();    }


    public function add_preguntaresp(Request $request)
    {
        // $organizations = Iglesia::findOrFail($id);
        //dd($request);
        // $wizzaranswer = ChurchQuestionWizard::where('iglesia_id', '=', $request->iglesia_id)->where('question_id', '=', $request->question_id)->first();
        //  $wizzarquestion = WizardQuestions::where('id' ,'=',  $request->question_id)->first();
        // $time = Carbon::now('America/El_Salvador');
        $wizzaranswer = new ChurchQuestionWizard();

        //  $wizzarquestion->date_added = $time->toDateTimeString();

        $wizzaranswer->question_id = $request->question_id;
        $wizzaranswer->iglesia_id = $request->iglesia_id;
        if ($request->answer == 1) {
            $wizzaranswer->answer = 1;
        }
        if ($request->answer == 0) {
            $wizzaranswer->answer = 0;
        }
        $wizzaranswer->save();
        alert()->success('La Pregunta y Respuesta han sido agregado correctamente');
        return back();
    }






    public function destroy($id)
    {
        $iglesia = Iglesia::findOrFail($id);
        //dd($question);
        $iglesia->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }



    public function datos_iglesia(Request $request)
    {
        $i = 1;
        $user   = User::findOrFail(auth()->user()->id);
        $iglesia = $user->iglesia->first();
        $departamentos = Departamento::get();
        $iglesia_grupo = $iglesia->iglesia_grupo;

        $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo , count(*) as numero_participantes
        from iglesia i
        join group_per_chuch_plan gpc
        on gpc.iglesia_id = i.id
        join grupo g on
        g.id = gpc.group_id
        join member p on
        p.organization_id=i.id
        join user_has_group q on
        p.id=q.member_id
        and q.group_per_church_id=gpc.id
        where i.id=?
        group by i.id , i.name  , g.id , g.nombre ";

        $conteo_miembros = DB::select($sql, array($iglesia->id));

        $sql2 = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member
            from iglesia i
            join group_per_chuch_plan gpc
            on gpc.iglesia_id = i.id
            join grupo g on
            g.id = gpc.group_id
            join member p on
            p.organization_id=i.id
            join user_has_group q on
            p.id=q.member_id
            and q.group_per_church_id=gpc.id
            where i.id=?";

        $miembros_iglesia = DB::select($sql2, array($iglesia->id));
        // dd($iglesiagp,$iglesia_grupo);

        $sql3 = "select a.id iglesia_grupo,a.iglesia_id,a.group_id No_grupo,b.nombre nombre_grupo FROM urban_stategies.group_per_chuch_plan a,urban_stategies.grupo b
            where a.group_id=b.id
            and a.iglesia_id=?";

        $grupos_iglesia = DB::select($sql3, array($iglesia->id));





        $url =  $request->root() . "/registro_participantes/" . $iglesia->id;


        QrCode::format('png')->size(200)->generate($url, public_path('img/qrcodeiglesia.png'));

        QrCode::format('png')->size(200)->generate($url . '1', public_path('img/qrcodeiglesiagrupo1.png'));


        QrCode::format('png')->size(200)->generate($url . '2', public_path('img/qrcodeiglesiagrupo2.png'));

        QrCode::format('png')->size(200)->generate($url . '3', public_path('img/qrcodeiglesiagrupo3.png'));

        QrCode::format('png')->size(200)->generate($url . '4', public_path('img/qrcodeiglesiagrupo4.png'));


        return view('catalog.iglesia.datos_iglesia', compact('departamentos',  'iglesia', 'conteo_miembros', 'miembros_iglesia', 'grupos_iglesia'));
        //return view('auth.register_member', compact('departamentos'));
    }
    public function copiarImagen(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagen = $request->file('image');
            $nombreImagen = $imagen->getClientOriginalName();
            $carpetaDestino = public_path('./images');
            $imagen->move($carpetaDestino, $nombreImagen);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
