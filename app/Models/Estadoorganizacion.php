<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadoorganizacion extends Model
{
    use HasFactory;
    
    protected $table = 'estado_organizacion';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = ['id','nombre'];
    protected $guarded = [];
}
