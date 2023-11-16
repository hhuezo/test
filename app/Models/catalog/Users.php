<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

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
    public function usuario_iglesia()
    {
        return $this->belongsToMany(Iglesia::class, 'users_has_iglesia', 'user_id','id');
    }

    public function user_rol()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id','id');
    }



}
