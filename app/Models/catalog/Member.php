<?php

namespace App\Models\catalog;

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
'aboutme','email',
'cel_phone_number',
'country_id',
'state_id',
'city_id',
'address',
'data_created',
'status',
'organization_id',
'user_id'
    ];
    protected $guarded = [];

    public function organizacionestado()
        {
            return $this->belongsTo('App\Models\catalog\OrganizationStatus','id','status');
            //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
        }
     };

