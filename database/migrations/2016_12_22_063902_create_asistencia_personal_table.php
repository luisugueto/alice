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
            $table->datetime('entrada');
            $table->datetime('salida');

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
