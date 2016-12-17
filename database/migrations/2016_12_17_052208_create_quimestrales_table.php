<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuimestralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quimestrales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->integer('id_quimestre')->unsigned();
            $table->integer('total_faltas_j');
            $table->integer('total_faltas_i');
            $table->integer('total_atrasos_j');
            $table->integer('total_atrasos_i');
            $table->double('sumatoria');
            $table->double('avg_aprovechamiento_q');
            $table->integer('id_comportamiento')->unsigned();
            $table->text('recomendaciones');


            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('cascade');
            $table->foreign('id_quimestre')->references('id')->on('quimestres')->onDelete('cascade');
            $table->foreign('id_comportamiento')->references('id')->on('comportamiento')->onDelete('cascade');
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
        Schema::drop('quimestrales');
    }
}
