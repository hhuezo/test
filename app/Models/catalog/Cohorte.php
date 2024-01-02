<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohorte extends Model
{
    use HasFactory;

    protected $table = 'cohorte';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'region_id',
    ];

    protected $guarded = [];
    public function region()
    {
        return $this->belongsTo('App\Models\catalog\Region', 'region_id','id' );

    }

    public function sedes()
    {
        return $this->hasMany(Sede::class, 'cohorte_id');
    }
}
