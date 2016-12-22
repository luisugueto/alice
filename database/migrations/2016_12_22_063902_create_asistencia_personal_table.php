<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciaPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia_personal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('datos_generales_personal')->onDelete('cascade');
            $table->integer('id_fecha')->unsigned();
            $table->foreign('id_fecha')->references('id')->on('fechas_asistencias')->onDelete('cascade');
            $table->time('entrada');
            $table->time('salida');

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
        Schema::drop('asistencia_personal');
    }
}
