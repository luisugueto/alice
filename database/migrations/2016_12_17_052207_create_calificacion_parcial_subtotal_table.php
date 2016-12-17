<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionParcialSubtotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_parcial_subtotal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parcial')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->double('avg_total');
            $table->integer('id_equivalencia')->unsigned();
            
            $table->foreign('id_parcial')->references('id')->on('parciales')->onDelete('cascade');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas')->onDelete('cascade');
            $table->foreign('id_equivalencia')->references('id')->on('equivalencias')->onDelete('cascade');
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
        Schema::drop('calificacion_parcial_subtotal');
    }
}
