<?php

namespace App\Http\Controllers\catalog;

use App\Http\Controllers\Controller;
use App\Models\catalog\Departamento;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use App\Models\catalog\MemberStatus;
use App\Models\catalog\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grupos = Grupo::get();
        $iglesia =Iglesia::get();

        return view('catalog.grupo.index', compact('grupos','iglesia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::get();
        $iglesia =Iglesia::get();
        return view('catalog.grupo.create', compact('grupos','iglesia'));
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
            'nombre.required' => 'ingresar nombre de grupo',
        ];

        $request->validate([

            'nombre' => 'required',

        ], $messages);
        $groups = new Grupo();
        $groups->nombre = $request->nombre;
        $groups->save();
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

        $grupos = Grupo::findOrFail($id);
        $grupo_iglesias=  $grupos->iglesiagrupo;
        $iglesiaArray =  $grupo_iglesias->pluck('id')->toArray();
        $grupos_noasignados = iglesia::whereNotIn('id', $iglesiaArray)->get();
        return view('catalog.grupo.edit', compact('grupos',   'grupo_iglesias','grupos_noasignados'));
       //return view('catalog.grupo.edit', compact('grupos'));
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
        $groups = Grupo::findOrFail($id);
        $groups->nombre = $request->nombre;
        $groups->update();
        alert()->success('El registro ha sido Modificado correctamente');
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
        $groups = Grupo::findOrFail($id);
        $groups->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return back();
    }

    public function reasigna_grupos($id)
    {
        $member_status = MemberStatus::get();

        $member = Member::findOrFail($id);

        $group = $member->user_has_group->first();

        $group_id = $group->group_id;


        $group_church = GroupPerchuchPlan::where('iglesia_id', '=', $member->organization_id)->get();

        $departamentos = Departamento::get();
        $iglesia = iglesia::findOrFail($member->organization_id);
        $grupos = Grupo::get();

        return view('auth.reasigna_grupos', compact('member', 'departamentos', 'iglesia', 'member_status', 'group_church', 'grupos', 'group_id'));
    }

    public function get_grupo($fecha)
    {
        $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $fecha);
        $hoy = Carbon::now();

        if ($fechaNacimiento->diffInYears($hoy) > 18) {
            // La persona tiene más de 18 años
            $grupos = Grupo::where('id', '>', 1)->get();
        } else {
            // La persona tiene 18 años o menos
            $grupos = Grupo::where('id', '=', 1)->get();
        }
        return $grupos;
    }

    public function attach_iglesiagrupo(Request $request)
    {


        $grupoiglesia =iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->attach($request->grupo_id);
        alert()->success('El registro ha sido agregada correctamente');
        return back();
    }



    public function dettach_iglesiagrupo(Request $request)
    {


        $grupoiglesia =iglesia::findOrFail($request->iglesia_id);
        $grupoiglesia->iglesiagrupo()->detach($request->grupo_id);
        alert()->error('se han sido eliminadas correctamente');
        return back();


       }
       public function  reporte_grupos($id_grupo_iglesia)
       {


           $grupos_iglesia =  GroupPerchuchPlan::findorfail($id_grupo_iglesia);

           $usuarios = Users::get();
           $grupo = Grupo::get();


           $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member,p.id as member_id
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
                   where  gpc.id=?";

           $miembros = DB::select($sql, array($grupos_iglesia->id));

           $iglesia = Iglesia::findorfail($grupos_iglesia->iglesia_id);
           $member_status = MemberStatus::get();




           $pdf = \Pdf::loadView('auth.reporte_grupos', compact('miembros', 'iglesia', 'usuarios', 'grupo', 'member_status'));
           return $pdf->stream('Info.pdf');
       }

       public function consulta_grupos($id_grupo_iglesia)
       {


           //$municipios = Municipio::where('departamento_id', '=', 1)->get();
           //  //$organizations = Organization::get();
           // $iglesia = Iglesia::where('id', '=', $id_iglesia)->get();
           $grupos_iglesia =  GroupPerchuchPlan::findorfail($id_grupo_iglesia);
           //dd($iglesia,$i);

           //  $miembros = Member::where('organization_id', '=', $id_iglesia)->get();
           //dd($miembros->iglesia_grupo->nombre);
           $usuarios = Users::get();
           $grupo = Grupo::get();

           // $miembros = DB::table('member as a')
           // ->join('user_has_group as b', 'b.member_id', '=', 'a.id')
           //->join('group_per_chuch_plan as c', function ($join) {
           //    $join->on('c.iglesia_id', '=', 'a.organization_id')
           //->on('c.id', '=', 'b.group_per_church_id')
           //->on('a.organization_id =? ');
           //})        ->join('grupo as d', 'c.group_id', '=', 'd.id')        ->select('a.id','a.name_member', 'a.lastname_member', 'd.nombre')        ->get();


           $sql = "select  i.id iglesia_id, i.name nombre_iglesia, g.id No_grupo, g.nombre nombre_grupo ,p.name_member,p.lastname_member,p.id as member_id
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
           where  gpc.id=?";

           $miembros = DB::select($sql, array($grupos_iglesia->id));

           $iglesia = Iglesia::findorfail($grupos_iglesia->iglesia_id);
           $member_status = MemberStatus::get();



           return view('auth.consulta_grupos', compact('miembros', 'iglesia', 'usuarios', 'grupo', 'member_status'));
           //return view('auth.register_member', compact('departamentos'));

       }

}
