<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePerCourse extends Model
{
    use HasFactory;
    protected $table = 'file_per_course';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'course_id',
        'route',
        'name',
        'created_at'
    ];
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
        //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
    }
};
