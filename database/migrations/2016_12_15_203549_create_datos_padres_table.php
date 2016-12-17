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
            $table->string('nombres_pa', 25);
            $table->string('cedula_pa', 25)->unique();
            $table->string('foto_pa', 255);
            $table->string('lugar_trabajo', 50);
            $table->text('direccion_pa');
            $table->string('telefono_pa', 25);
            $table->string('correo_pa', 25)->unique();
            $table->string('nacionalidad_pa', 50);
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
