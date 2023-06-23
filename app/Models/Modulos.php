<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;

    protected $primary_key = "id_modulo";
    public $timestamps = false;
    protected $fillable = ['nombre_modulo'];

    protected $table = "modulos";
}
