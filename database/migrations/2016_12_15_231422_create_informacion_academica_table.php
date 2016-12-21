<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_academica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('datos_generales_personal')->onDelete('Cascade');
            $table->string('primaria', 55);
            $table->string('secundaria', 55);
            $table->string('superior', 55);
            $table->string('titulo', 255);
            $table->text('cursos');
            $table->text('historial_laboral');
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
        Schema::drop('informacion_academica');
    }
}
