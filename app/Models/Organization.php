<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'secondary_contact_name',
        'secondary_contact_job_title',
        'secondary_contact_phone_number',
        'secondary_contact_phone_number_2',
        'status'
    ];

    //protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class, 'users_has_orgs', 'organization_id','users_id');
    }
}
