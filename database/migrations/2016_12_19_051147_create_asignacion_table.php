<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prof')->unsigned();
            $table->foreign('id_prof')->references('id')->on('datos_generales_personal')->onDelete('Cascade');
            $table->integer('id_asbloque')->unsigned();
            $table->foreign('id_asbloque')->references('id')->on('asignacion_bloques')->onDelete('Cascade');
            $table->integer('id_cuseccion')->unsigned('id');
            $table->foreign('id_cuseccion')->references('id')->on('secciones')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignacion');
    }
}
