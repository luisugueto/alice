<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosGeneralesEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales_estudiante', function(Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_matricula', 255)->unique();
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('cedula', 25)->unique();
            $table->date('fecha_nacimiento');
            $table->date('fecha_registro');
            $table->string('genero', 25);
            $table->string('estado_actual', 50);
            $table->string('tipo_registro', 25);
            $table->text('direccion');
            $table->string('nacionalidad', 50);
            $table->string('provincia', 50);
            $table->string('ciudad_natal', 50);
            $table->string('telefono', 25);
            $table->string('correo', 25)->unique();
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
        Schema::drop('datos_generales_estudiante');   //
    }
}
