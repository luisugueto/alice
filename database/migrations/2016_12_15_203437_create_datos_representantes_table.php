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
            $table->string('nombres_re', 50);
            $table->string('nacionalidad_ce', 50);
            $table->string('cedula_re', 25);
            $table->string('parentesco', 20);
            $table->string('nacionalidad_re', 50);
            $table->string('telefono_re', 50);
            $table->text('direccion_re');
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
