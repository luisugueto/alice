<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionRecuperativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_recuperativos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
            $table->integer('id_recuperativo')->unsigned();
            $table->foreign('id_recuperativo')->references('id')->on('tipo_recuperativos')->onDelete('cascade');
            $table->double('calificacion');
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
        Schema::drop('calificacion_recuperativos');
    }
}
