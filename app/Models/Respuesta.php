<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $table = 'respuesta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'descripcion',
        'pregunta_id'
    ];
}
