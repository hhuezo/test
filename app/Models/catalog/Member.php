<?php

namespace App\Models\catalog;

use App\Models\User;
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
        'brithdate',
        'document_number_type',
        'document_type_id',
        'document_number',
        'catalog_gender_id',
        'aboutme', 'email',
        'cel_phone_number',
        'country_id',
        'departamento_id',
        'city_id',
        'address',
        'data_created',
        'status_id',
        'organization_id',
        'user_id'
    ];
    protected $guarded = [];

    public function organizacionestado()
    {
        return $this->belongsTo('App\Models\catalog\OrganizationStatus', 'id', 'status');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function member_has_group()
    {
        return $this->belongsToMany(Grupo::class, 'member_has_group','member_id');
    }


    public function genders(){
        return $this->belongsTo(Gender::class, 'catalog_gender_id','id');
    }
};
