<?php

namespace App\Models;

use App\Models\catalog\Municipio;
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

}
