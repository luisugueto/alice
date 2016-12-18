<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parciales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->integer('id_personal')->unsigned();
            $table->integer('id_quimestre')->unsigned();
            $table->integer('id_comportamiento')->unsigned();
            $table->integer('faltas_j');
            $table->integer('faltas_i');
            $table->integer('atrasos_j');
            $table->integer('atrasos_i');
            $table->text('observaciones');
            $table->double('avg_aprovechamiento');


            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('cascade');
            $table->foreign('id_personal')->references('id')->on('datos_generales_personal')->onDelete('cascade');
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
        Schema::drop('parciales');
    }
}
