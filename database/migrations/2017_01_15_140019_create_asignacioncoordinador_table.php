<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacioncoordinadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_coordinador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prof')->unsigned();
            $table->foreign('id_prof')->references('id')->on('datos_generales_personal')->onDelete('Cascade');
            $table->integer('id_seccion')->unsigned();
            $table->foreign('id_seccion')->references('id')->on('secciones')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
            
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
        Schema::drop('asignacion_coordinador');
    }
}
