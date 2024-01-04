<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionCorreos extends Model
{
    use HasFactory;


    protected $table = 'configuracion_smtp';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'from_address',
        'UsuarioCreacion',
        'UsuarioModificacion',
        'CreatedAt',
        'UpdateAt',
        'smtp_encryption',
        'smtp_from_name',
        'smtp_mailer',
    ];
}
