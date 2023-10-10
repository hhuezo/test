<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    use HasFactory;
    protected $table = 'Quiz';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name_es',
'name_en',
'status',
'date_created',
'course_id'  ];
protected $guarded = [];

public function coursecat()
    {
        return $this->belongsTo(Course::class,'course_id','id');
        //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
        //return $this->belongsTo('App\Models\catalog\Question','catalog_questions_id','id');
    }
 };


