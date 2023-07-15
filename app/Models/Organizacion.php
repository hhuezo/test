<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $table = 'organizacion';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = ['id','user_id','nombre','telefono','nota','contacto_principal','cargo_contacto_principal','telefono_contacto_principal',
    'nombre_contacto_secundario','cargo_contacto_secundario','telefono_contacto_secundario','estado_organizacion_id'];
    
    protected $guarded = [];

    public function user()
    {
        // parametros : (ruta del modelo a relacionar, campo origen indice, campo otra tabla indice)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
