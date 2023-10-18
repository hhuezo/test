<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    use HasFactory;
    protected $table = 'iglesia';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'catalog_departamento_id',
        'catalog_municipio_id',
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
        'facebook',
        'website',
        'personeria_juridica',
        'organization_type',
        'status',
        'sede_id',
        'logo_url',
        'logo_name'

    ];


        protected $guarded = [];

   public function sedeiglesia()
       {
           return $this->belongsTo('use App\Models\catalog\Sede','id','sede_id');
           //return $this->belongsTo('App\Models\LugarOrigen', 'tck_lor_codigo', 'lor_codigo');
       }
       public function departamentos(){
        return $this->belongsTo(Departamento::class,'catalog_departamento_id','id');
       }


}
