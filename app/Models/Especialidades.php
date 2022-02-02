<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    use HasFactory;
    //se agrega las variables de cada base de datos
    protected $fillable = [
        'nbEspecialidad',
        'descripcion',
        'fechaRegistro',
        'fechaModificacion',
        'usuarioRegistro',
        'usuarioModificacion',
        'estado'
    ];

}
