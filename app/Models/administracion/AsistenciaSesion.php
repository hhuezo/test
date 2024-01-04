<?php

namespace App\Models\administracion;

use App\Models\catalog\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaSesion extends Model
{
    use HasFactory;

    protected $table = 'attendance_per_session';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'sessions_id',
        'member_id',
        'attended',
        'date_added',
        'notes',
    ];

    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'sessions_id', 'id');
    }


    public function participante()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }




}
