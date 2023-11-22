<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'catalog_gender';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'description',
    ];
}
