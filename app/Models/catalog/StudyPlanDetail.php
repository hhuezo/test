<?php

namespace App\Models\catalog;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlanDetail extends Model
{
    use HasFactory;
    protected $table = 'study_plan_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'course_id',
        'study_plan_id',
        'date_added',

    ];
    protected $guarded = [];

    public function plan_estudio()
    {
        return $this->belongsTo(StudyPlan::class, 'study_plan_id','id' );
    }

    public function curso()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
