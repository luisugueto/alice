<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemuneracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remuneracion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('datos_generales_personal')->onDelete('Cascade');
            $table->double('sueldo_mens', 10,2);
            $table->double('descuento_iess', 10,2);
            $table->double('bono_responsabilidad', 10,2);
            $table->string('horas_extras', 2);
            $table->bigInteger('cuenta_bancaria')->unique();
            $table->string('devolver_fondos', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('remuneracion');
    }
}
