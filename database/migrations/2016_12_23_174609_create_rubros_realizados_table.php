<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubrosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros_realizados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_factura_rubro')->unsigned();
            $table->foreign('id_factura_rubro')->references('id')->on('facturas_rubros')->onDelete('Cascade');
            $table->double('monto_pagado', 10, 2);
            $table->double('monto_adeudado', 10, 2);
            $table->date('fecha');
            $table->integer('id_modalidad')->unsigned();
            $table->foreign('id_modalidad')->references('id')->on('modalidads')->onDelete('Cascade');
            $table->bigInteger('no_transferencia');
            $table->bigInteger('no_cheque');
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
        Schema::drop('rubros_realizados');
    }
}
