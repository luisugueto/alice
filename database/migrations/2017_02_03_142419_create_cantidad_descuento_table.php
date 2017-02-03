<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantidadDescuentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantidad_descuento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipoempleado')->unsigned();
            $table->double('cantidad');

            $table->foreign('id_tipoempleado')->references('id')->on('tipo_empleado');
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
        Schema::drop('cantidad_descuento');
    }
}
