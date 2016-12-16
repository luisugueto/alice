<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosPadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_padres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('Cascade');
            $table->string('nombres', 25);
            $table->string('cedula', 25)->unique();
            $table->string('foto', 255);
            $table->string('lugar_trabajo', 50);
            $table->text('direccion');
            $table->string('telefono', 25);
            $table->string('correo', 25)->unique();
            $table->string('nacionalidad', 50);
            $table->string('nivel_educacion', 20);
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
        Schema::drop('datos_padres');
    }
}
