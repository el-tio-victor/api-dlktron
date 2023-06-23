<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccioncrudRolModulo extends Model
{
    use HasFactory;

    protected $primary_key = "id_accion-crud_rol_modulo";
    public $timestamps = false;
    protected $fillable = ['id_rol_accion-crud_rol_modulo',
    'id_modulo_accion-crud_rol_modulo',
    'id_accion-crud_accion-crud_rol_modulo'];

    protected $table = 'acciones-crud_roles_modulos';

    public function roles(){
        return $this->belongsToMany(Roles::class,
        'acciones-crud_roles_modulos',
        "id_rol_accion-crud_rol_modulo",
        "id_accion-crud_rol_modulo");
    }
}
