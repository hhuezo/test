<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WizardQuestions extends Model
{
    use HasFactory;
    protected $table = 'wizard_church_questions';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'question',
        'answer',
        'active',
        'date_add'
    ];
    protected $guarded = [];

    public function respuesta()
        {

            return $this->belongsTo('App\Models\catalog\ChurchQuestionWizard', 'question_id','id' );

        }
}
