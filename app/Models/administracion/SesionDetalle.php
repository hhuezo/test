<?php

namespace App\Models\administracion;

use App\Models\catalog\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionDetalle extends Model
{
    use HasFactory;

    protected $table = 'session_per_group_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'session_id',
        'course_id',
    ];

    public function sesion()
    {
        return $this->belongsTo(Sesion::class, 'session_id', 'id');

    }

    public function curso()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');

    }
}
