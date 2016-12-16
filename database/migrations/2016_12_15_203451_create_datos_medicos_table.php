<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_medicos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('Cascade');
            $table->string('grupo_sanguineo', 50);
            $table->double('peso', 10,2);
            $table->double('altura', 10,2);
            $table->text('capacidad_especial');
            $table->integer('porcentaje_discapacidad');
            $table->text('medicinas_contraindicadas');
            $table->text('alergico_a');
            $table->text('patologia');
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
        Schema::drop('datos_medicos');
    }
}
