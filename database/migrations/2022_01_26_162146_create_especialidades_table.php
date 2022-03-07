<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();

            $table->string('nbEspecialidad')->unique();
            $table->text('descripcion');
            $table->date('fechaRegistro');
            $table->date('fechaModificacion');
            $table->string('usuarioRegistro');
            $table->string('usuarioModificacion');
            $table->enum('estado',['Activa', 'Inactiva'])->default('Activa');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades');
    }
}
