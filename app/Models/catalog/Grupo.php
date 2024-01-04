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

    public function member_has_group()
    {
        return $this->belongsToMany(Member::class, 'member_has_group', 'group_id', 'member_id');
    }

    public function iglesia_has_grupo()
    {
        return $this->belongsToMany(Iglesia::class, 'iglesia_has_grupo', 'grupo_id', 'iglesia_id');
    }

    // public function iglesia_grupo()
    // {
    //     return $this->belongsToMany(Iglesia::class, 'group_per_chuch_plan', 'group_id', 'id');
    // }
}
