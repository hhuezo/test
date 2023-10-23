<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\catalog\OrganizationStatus;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organization';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'phone_number',
        'notes',
        'contact_name',
        'contact_job_title',
        'contact_phone_number',
        'contact_phone_number_2',
        'facebook',
        'website',
        'personeria_juridica',
        'organization_type',
        'depedent',
        'status'

    ];


        protected $guarded = [];

   public function organizacionestado()
       {
           return $this->belongsTo('use App\Models\catalog\OrganizationStatus','id','status');
           //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
       }
    };



