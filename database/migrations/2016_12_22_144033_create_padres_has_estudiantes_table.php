<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresHasEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padres_has_estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('Cascade');
            $table->integer('id_padre')->unsigned();
            $table->foreign('id_padre')->references('id')->on('datos_padres')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('padres_has_estudiantes');
    }
}
