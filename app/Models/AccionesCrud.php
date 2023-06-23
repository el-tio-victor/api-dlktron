<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccionesCrud extends Model
{
    use HasFactory;

    protected $primaryKey = "id_accion-crud";
    public $timestamps = false;
    protected $fillable = ['nombre_accion-crud'];

    protected $table = "acciones-crud";

    public function roles(){
        return $this->belongsToMany(
            Roles::class,
             "acciones-crud_roles_modulos",
             "id_acion-crud_accion-crud_rol_modulo","id_rol_accion-crud_rol_modulo");
    }

}
