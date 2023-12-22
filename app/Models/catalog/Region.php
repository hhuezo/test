<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'region';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];
    protected $guarded = [];



    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'region_id');
    }

    public function cohortes()
    {
        return $this->hasMany(Cohorte::class, 'region_id');
    }

}
