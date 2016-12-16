<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosGeneralesPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales_personal', function (Blueprint $table) {
            $table->inrements('id');
            $table->string('codigo_pesonal', 25);
            $table->string('apellido_paterno', 25);
            $table->string('apellido_materno', 25);
            $table->string('nombres', 50);
            $table->string('cedula', 25)->unique();
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->integer('edad');
            $table->string('edo_civil', 20);
            $table->string('genero', 1);
            $table->string('estado_actual', 25);
            $table->string('tipo_registro', 20);
            $table->string('especialidad', 50);
            $table->text('direccion');
            $table->string('telefono', 25);
            $table->string('correo')->unique();
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos');
            $table->string('clave', 15);
            $table->string('ingreso_notas', 2);
            $table->integer('id_tipo')->unsigned();
            $tabñe->foreign('id_tipo')->references('id')->on('tipo_empleado');
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
        Schema::drop('datos_generales_personal');
    }
}
