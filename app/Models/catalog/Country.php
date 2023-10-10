<?php

namespace App\Models\catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'iso',
        'description',
    ];

    protected $guarded = [];
}
