<?php

namespace App\Models\catalog;

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
    

    protected $guarded = [];
    public function question_has_answer()
    {
        return $this->belongsToMany(Answer::class,'answer_has_question','question_id','answer_id');
    }

}
