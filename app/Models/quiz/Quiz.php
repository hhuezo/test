<?php

namespace App\Models\quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name_es',
        'name_en',
        'status',
        'course_id'
    ];


    public function quiz_has_question(){
        return $this->belongsToMany(Question::class, 'questions_per_quiz', 'quiz_id', 'catalog_questions_id');
    }
}
