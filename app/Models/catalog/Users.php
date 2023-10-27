<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $guarded = [];
    public function usuarioiglesia()
    {
        return $this->belongsToMany(Iglesia::class, 'users_has_iglesia', 'user_id',);
    }



}
