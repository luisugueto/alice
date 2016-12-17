<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_realizados', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto_pagado', 10, 2);
            $table->double('monto_adeudado', 10, 2);
            $table->date('fecha');
            $table->integer('id_prestamo')->unsigned();
            $table->integer('id_modalidad')->unsigned();
            $table->bigInteger('no_transferencia');
            $table->bigInteger('no_cheque');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pagos_realizados');
    }
}
