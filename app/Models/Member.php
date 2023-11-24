<?php

namespace App\Models;

use App\Models\catalog\Gender;
use App\Models\catalog\GroupPerchuchPlan;
use App\Models\catalog\Municipio;
use App\Models\catalog\Users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name_member',
        'lastname_member',
        'birthdate',
        'document_number_type',
        'document_type_id',
        'document_number',
        'catalog_gender_id',
        'about_me',
        'email',
        'cell_phone_number',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'date_created',
        'status',
        'organization_id',
        'users_id',
        'municipio_id'
    ];

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id','id');
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id','id');
    }

    public function organizacionestado()
    {
        return $this->belongsTo('App\Models\catalog\OrganizationStatus', 'id', 'status');
        //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
    }

    public function usuario_iglesia()
    {
        return $this->belongsToMany(Users::class, 'users_has_iglesia', 'id', 'user_id');
    }

    public function user_has_group()
    {
        return $this->belongsToMany(GroupPerchuchPlan::class, 'user_has_group', 'member_id', 'group_per_church_id');
    }

    public function genders(){
        return $this->belongsTo(Gender::class, 'catalog_gender_id','id');
    }

}
