<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];

    public function iglesiagrupo()
        {
            return $this->belongsToMany(Iglesia::class, 'iglesia_has_grupo', 'grupo_id');
        }


}
