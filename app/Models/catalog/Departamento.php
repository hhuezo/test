<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'catalog_departamento';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];
}
