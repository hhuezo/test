<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $table = 'sessions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'group_per_church_id',
        'session_name',
        'meeting_date',
        'date_added',
        'completed',
        'attendance_document',
        'notas_sobre_sesion',
    ];

    public function iglesia_plan_estudio()
    {
        return $this->belongsTo(IglesiaPlanEstudio::class, 'group_per_church_id', 'id');
    }

    public function detalles()
    {
        return $this->hasMany(SesionDetalle::class, 'session_id');
    }

    public function asistencias()
    {
        return $this->hasMany(AsistenciaSesion::class, 'sessions_id');
    }

    public function asistencia($sessions_id, $member_id)
    {
        $data =  AsistenciaSesion::where('sessions_id', $sessions_id)->where('member_id', $member_id)->select('attended')->first();


        if (!$data) {
            return 0;
        }

        return $data->attended;
    }
}
