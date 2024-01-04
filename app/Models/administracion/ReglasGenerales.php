<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReglasGenerales extends Model
{
    use HasFactory;
    protected $table = 'general_rules';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'rule_name',
        'abbrev',
        'quantity',
        'notes',
        'date_added',
        'user_added',
        'date_modified',
        'user_modifies',

    ];
}
