<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchQuestionWizard extends Model
{


    use HasFactory;
    protected $table = 'church_question_wizard';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'question_id',
        'iglesia_id',
        'answer',
        'date_added'
    ];


    public function pregunta()
    {
        return $this->belongsTo('App\Models\catalog\WizardQuestions', 'question_id','id' );

    }


}
