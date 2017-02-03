<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetardoAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retardo_asistencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->integer('id_fecha_asistencia')->unsigned();
            $table->integer('retardo');
            $table->foreign('id_fecha_asistencia')->references('id')->on('fechas_asistencias')->onDelete('cascade');
            $table->foreign('id_personal')->references('id')->on('datos_generales_personal')->onDelete('cascade');
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
        Schema::drop('retardo_asistencia');
    }
}
