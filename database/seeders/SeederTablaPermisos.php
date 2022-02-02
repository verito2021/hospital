<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Definimos todos los permisos
        $permisos=[
            //permisos de la tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //permisos de la tabla Paciente
            'ver-paciente',
            'crear-paciente',
            'editar-paciente',
            'borrar-paciente',
            //permisos de la tabla Especialidades
            'ver-especialidades',
            'crear-especialidades',
            'editar-especialidades',
            'borrar-especialidades',
        ];
        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
