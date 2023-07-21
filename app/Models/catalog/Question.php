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
}
