<?php

namespace App\Models\administracion;

use App\Models\catalog\Grupo;
use App\Models\catalog\Iglesia;
use App\Models\catalog\StudyPlan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IglesiaPlanEstudio extends Model
{
    use HasFactory;

    protected $table = 'group_per_chuch_plan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'iglesia_id',
        'group_id',
        'study_plan_id',
        'date_added',
        'start_date',
        'end_date',
        'closed',
    ];



    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class, 'iglesia_id', 'id');

    }

    public function plan_estudio()
    {
        return $this->belongsTo(StudyPlan::class, 'study_plan_id', 'id');

    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'group_id', 'id');

    }

    public function sesiones()
    {
        return $this->hasMany(Sesion::class, 'group_per_church_id');
    }
}
