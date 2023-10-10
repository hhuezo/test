<?php

namespace App\Models\Quiz;

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
        'course_id'
    ];


    public function Quiz_has_question(){
        return $this->belongsToMany(Question::class, 'questions_per_Quiz', 'Quiz_id', 'catalog_questions_id');
    }
}
