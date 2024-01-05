<?php

namespace App\Models\catalog;

use App\Models\administracion\IglesiaPlanEstudio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Iglesia extends Model
{
    use HasFactory;
    protected $table = 'iglesia';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'catalog_departamento_id',
        'catalog_municipio_id',
        'phone_number',
        'notes',
        'contact_name',
        'contact_job_title',
        'contact_phone_number',
        'contact_phone_number_2',
        'secondary_contact_name',
        'secondary_contact_job_title',
        'secondary_contact_phone_number',
        'secondary_contact_phone_number_2',
        'pastor_name',
        'pastor_phone_number',
        'facebook',
        'website',
        'personeria_juridica',
        'organization_type',
        'sede_id',
        'logo',
        'logo_url',
        'status_id',

    ];


    protected $guarded = [];



    // public function participantes()
    // {
    //     return $this->hasMany(Member::class, 'organization_id');
    // }

    public function plan_estudio(){
        return $this->hasMany(IglesiaPlanEstudio::class, 'iglesia_id');
    }

    public function sedeiglesia()
    {
        //return $this->belongsTo('use App\Models\catalog\Sede', 'id', 'sede_id');
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }


    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'catalog_departamento_id', 'id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'catalog_municipio_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_iglesia', 'iglesia_id');
    }

    public function users_has_iglesia()
    {
        return $this->belongsToMany(User::class, 'users_has_iglesia', 'iglesia_id', 'user_id');
    }

    public function iglesia_has_grupo()
    {
        return $this->belongsToMany(Grupo::class, 'iglesia_has_grupo', 'iglesia_id', 'grupo_id');
    }



    public function iglesia_estatus()
    {
        return $this->belongsTo(OrganizationStatus::class, 'status_id', 'id');
    }

    public function churchanswer()
    {
        return $this->belongsTo('App\Models\catalog\wizardQuestions', 'iglesia_id', 'id');
    }

    public function countMembers($iglesiaId, $groupId)
    {
        return DB::table('member_has_group')->join('member as m', 'member_has_group.member_id', '=', 'm.id')
            ->join('users as u', 'm.users_id', '=', 'u.id')
            ->join('users_has_iglesia as uhi', 'u.id', '=', 'uhi.user_id')
            ->whereIn('m.status_id',[2,4])
            ->where('uhi.iglesia_id', $iglesiaId)
            ->where('member_has_group.group_id', $groupId)
            ->count();
    }


    public function participantes($iglesiaId)
    {
        return DB::table('member_has_group')->join('member as m', 'member_has_group.member_id', '=', 'm.id')
            ->join('users as u', 'm.users_id', '=', 'u.id')
            ->join('grupo as g', 'member_has_group.group_id', '=', 'g.id')
            ->join('users_has_iglesia as uhi', 'u.id', '=', 'uhi.user_id')
            ->where('uhi.iglesia_id', $iglesiaId)
            ->select('m.id', DB::raw('CONCAT(m.name_member, " ", m.lastname_member) as nombre'), 'member_has_group.group_id', 'g.nombre as grupo', 'm.status_id')
            ->get();
    }



    public function participantes_iglesia($iglesiaId)
    {
        return DB::table('member_has_group')->join('member as m', 'member_has_group.member_id', '=', 'm.id')
            ->join('users as u', 'm.users_id', '=', 'u.id')
            ->join('grupo as g', 'member_has_group.group_id', '=', 'g.id')
            ->join('users_has_iglesia as uhi', 'u.id', '=', 'uhi.user_id')
            ->where('uhi.iglesia_id', $iglesiaId)
            ->select('m.id', 'm.document_number', DB::raw('CONCAT(name_member, " ", lastname_member) as nombre'), 'm.cell_phone_number', 'm.email', 'm.catalog_gender_id', 'member_has_group.group_id as grupo_id','g.nombre as grupo')
            ->get();
    }

    public function validar_asistencias($iglesiaId)
    {
        $result = 0;
        $data = DB::table('attendance_per_session as asistencia')
            ->join('sessions', 'asistencia.sessions_id', '=', 'sessions.id')
            ->join('group_per_chuch_plan as plan', 'plan.id', '=', 'sessions.group_per_church_id')
            ->where('plan.group_id', '<>', 1)
            ->where('plan.iglesia_id', '=', $iglesiaId)
            ->where('asistencia.attended', '=', 1)
            ->groupBy('asistencia.member_id')
            ->select('asistencia.member_id', DB::raw('count(*) AS conteo'))
            ->get();

        if ($data) {
            $result =  $data->count();
        }
        return $result;
    }

    public function validar_asistencias_jovenes($iglesiaId)
    {

        $result = 0;
        $data = DB::table('attendance_per_session as asistencia')
            ->join('sessions', 'asistencia.sessions_id', '=', 'sessions.id')
            ->join('group_per_chuch_plan as plan', 'plan.id', '=', 'sessions.group_per_church_id')
            ->where('plan.group_id', '=', 1)
            ->where('plan.iglesia_id', '=', $iglesiaId)
            ->where('asistencia.attended', '=', 1)
            ->groupBy('sessions.id')
            ->havingRaw('count(*) < 9')
            ->select('sessions.id', DB::raw('count(*) as conteo'))
            ->get();

        if ($data) {
            $result =  $data->count();
        }
        return $result;
    }
}
