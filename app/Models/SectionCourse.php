<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionCourse extends Model
{
    use HasFactory;
    protected $table = 'sections_per_course';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'description',
        'tbd',
        'course_id',
    ];

    protected $guarded = [];

    public function courses(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    

}
