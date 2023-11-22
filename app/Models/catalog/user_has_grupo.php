<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_has_grupo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'user_has_group';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
       'member_id','group_per_church_id','date_added' ,
    ];


}
