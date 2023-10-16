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
        'corte_id',
   ];
protected $guarded = [];
public function cohorte()
    {
        return $this->belongsTo('App\Models\catalog\Cohorte', 'corte_id','id' );

    }

}
