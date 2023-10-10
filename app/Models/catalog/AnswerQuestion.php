<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    use HasFactory;

    protected $table = 'answer_has_question';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'question_id',
        'answer_id',
        'correct',

    ];

    public function questions()
    {
        return $this->belongsTo('App\Models\catalog\Question', 'questions_id', 'id');
    }

    public function answers()
    {
        return $this->belongsTo('App\Models\catalog\Answer', 'answer_id', 'id');
    }
}
