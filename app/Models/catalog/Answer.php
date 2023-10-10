<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\catalog\Question;


class Answer extends Model
{
    use HasFactory;
    protected $table = 'catalog_answers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description',
        'catalog_questions_id',
        'correct_answer'
    ];


    protected $guarded = [];

    public function questions()
    {
        return $this->belongsTo('App\Models\catalog\Question', 'catalog_questions_id', 'id');
        //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
    }

    public function question_has_answerd()
    {
        return $this->belongsToMany(Question::class, 'answer_has_question', 'answer_id');
    }
}
