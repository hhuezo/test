<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    use HasFactory;

    protected $table = 'study_plan';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description',
        'description_es',
    ];
    protected $guarded = [];

    public function detalles()
    {
        return $this->hasMany(StudyPlanDetail::class, 'study_plan_id');
    }


}
