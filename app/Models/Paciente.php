<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
     //se agrega las variables de cada base de datos
    protected $fillable = [
            'nombre',
            'apellido',
            'numCedula',
            'telefono',
            'fechaNacimiento',
            'direccion',
            'ciudad',
            'genero',
            'email',
            'password',
    ];
}
