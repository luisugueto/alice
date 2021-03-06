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
            $table->string('nombres_pa', 25);
            $table->string('cedula_pa', 25);
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
