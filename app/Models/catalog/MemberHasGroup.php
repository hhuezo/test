<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberHasGrupo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'member_has_group';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
       'member_id','grupo_id','date_added' ,
    ];


}
