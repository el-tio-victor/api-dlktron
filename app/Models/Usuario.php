<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $primary_key = "id_usuario";
    public $timestamps = false;
    protected $fillable = ['nombre_usuario', 'paterno_usuario','materno_usuario','correo_usuario','id_rol_usuario'];

    protected $table = "usuarios";

    public function rol(){ return $this->hasOne(Roles::class,'id_rol_usuario',"id_usuario");}
}
