<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'pregunta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'descripcion'
    ];
}
