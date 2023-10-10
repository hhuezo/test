<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCourse extends Model
{
    use HasFactory;
    protected $table = 'file_per_course';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'route',
        'name',
        'course_id',
        'section_id'
    ];

    protected $guarded = [];

    public function sections(){
        return $this->belongsTo(SectionCourse::class,'section_id','id');
    }


}
