<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionParcialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_parcial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parcial')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->double('calificacion');

            $table->foreign('id_parcial')->references('id')->on('parciales')->onDelete('cascade');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categorias_parcial')->onDelete('cascade');
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
        Schema::drop('calificacion_parcial');
    }
}
