<?php

namespace App\Models;

use App\Models\catalog\Iglesia;
use App\Models\catalog\Member;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false;

    public function user_has_iglesia()
    {
        return $this->belongsToMany(Iglesia::class,'users_has_iglesia','user_id','iglesia_id');
    }
    public function user_rol()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id');
    }

    public function usuario_participante()
    {
        return $this->hasMany(Member::class,'users_id' );
       // return $this->belongsTo(Member::class, ');
    }

    protected $guarded = [];




}
