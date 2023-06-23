<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public $primaryKey = "id_rol";
    public $timestamps = false;

    protected $fillable = ["nombre_rol"];

    protected $table = "roles";

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_rol_usuario','id_rol');
    }

    public function acciones(){
        return $this->belongsToMany(
            AccionesCrud::class,
             "acciones-crud_roles_modulos",
             "id_rol_accion-crud_rol_modulo","id_accion-crud_accion-crud_rol_modulo");
    }
}
