<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sede';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'cohorte_id',
    ];
    protected $guarded = [];
    public function cohorte()
    {
        return $this->belongsTo(Cohorte::class, 'cohorte_id', 'id');
    }

    public function iglesias()
    {
        return $this->hasMany(Iglesia::class, 'sede_id');
    }
}
