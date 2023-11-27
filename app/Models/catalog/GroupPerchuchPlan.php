<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPerchuchPlan extends Model
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


    // public function miembro_grupo()
    // {
    //     return $this->belongsToMany(Member::class, 'user_has_group', 'group_per_church_id', 'member_id');
    // }

    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class, 'iglesia_id', 'id');

    }

    public function plan_estudio()
    {
        return $this->belongsTo(PlanEstudio::class, 'study_plan_id', 'id');

    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'group_id', 'id');

    }

}
