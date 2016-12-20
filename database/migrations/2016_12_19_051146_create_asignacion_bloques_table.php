<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_bloques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_asig')->unsigned();
            $table->foreign('id_asig')->references('id')->on('asignaturas')->onDelete('Cascade');
            $table->integer('id_seccion')->unsigned();
            $table->foreign('id_seccion')->references('id')->on('secciones')->onDelete('Cascade');
            $table->integer('id_bloque')->unsigned();
            $table->foreign('id_bloque')->references('id')->on('bloques')->onDelete('Cascade');
            $table->integer('id_aula')->unsigned();
            $table->foreign('id_aula')->references('id')->on('aulas')->onDelete('Cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignacion_bloques');
    }
}
