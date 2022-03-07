<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioEspecialidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_especialidad', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->foreignId('users_id')
            ->nullable( )
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('especialidades_id')
            ->nullable( )
            ->constrained('especialidades')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_especialidad');
    }
}
