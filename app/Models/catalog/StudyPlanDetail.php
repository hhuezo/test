<?php

namespace App\Models\catalog;

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

}
