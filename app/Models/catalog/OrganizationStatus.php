<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationStatus extends Model
{
    use HasFactory;
    protected $table = 'catalog_organization_status';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description',
'description_es',
'color_hex',
'adding_date',
'modifying_user',
'modifying_date',
'status',
    ];


}
