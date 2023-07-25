<?php

namespace App\Models\quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'catalog_questions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description'
    ];

    public function question_has_quiz(){
        return $this->belongsToMany(Quiz::class, 'questions_per_quiz', 'catalog_questions_id', 'quiz_id');
    }
}
