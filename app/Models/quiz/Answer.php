<?php

namespace App\Models\quiz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'catalog_answers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description',
        'catalog_questions_id'
    ];
}
