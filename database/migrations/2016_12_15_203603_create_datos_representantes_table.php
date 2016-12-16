<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_representantes', function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('Cascade');
            $table->string('nombres', 50);
            $table->string('cedula', 25)->unique();
            $table->string('parentesco', 20);
            $table->string('nacionalidad', 50);
            $table->string('telefono', 50);
            $table->text('direccion');
            $table->string('vive_con', 255);
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
        Schema::drop('datos_representantes');
    }
}
