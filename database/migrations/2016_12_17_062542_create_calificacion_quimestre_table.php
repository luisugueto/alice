<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionQuimestreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_quimestre', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_quimestrales')->unsigned();
            $table->integer('id_asignatura')->unsigned();
            $table->double('avg_gp');
            $table->double('avg_gp80');
            $table->double('examen_q');
            $table->double('examen_q20');
            $table->double('avg_q_cuantitativa');
            $table->integer('id_equivalencia')->unsigned();


            $table->foreign('id_quimestrales')->references('id')->on('quimestrales')->onDelete('cascade');
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
        Schema::drop('calificacion_quimestre');
    }
}
