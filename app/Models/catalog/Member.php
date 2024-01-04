<?php

namespace App\Models\catalog;

use App\Models\User;
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
        'aboutme', 'email',
        'cel_phone_number',
        'country_id',
        'departamento_id',
        'municipio_id',
        'address',
        'is_pastor',
        'data_created',
        'organization_id',
        'users_id',
        'status_id',
    ];
    protected $guarded = [];

    public function organizacionestado()
    {
        return $this->belongsTo(OrganizationStatus::class, 'id', 'status');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function iglesias(){
        return $this->belongsTo(Iglesia::class,'organization_id');
    }


    public function member_has_group()
    {
        return $this->belongsToMany(Grupo::class, 'member_has_group','member_id', 'group_id');
    }

    public function grupo_first($id)
    {
        $participante = Member::findOrFail($id);
        $grupo = $participante->member_has_group->first();
        if($grupo)
        {
            return $grupo->id;
        }

        return 0;
    }

    public function genders(){
        return $this->belongsTo(Gender::class, 'catalog_gender_id','id');
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class,'municipio_id','id');
    }





};
