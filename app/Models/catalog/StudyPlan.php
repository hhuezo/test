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

public function plan_cursos()
    {
        return $this->belongsToMany(Course::class, 'study_plan_detail', 'study_plan_id');

    }



}
