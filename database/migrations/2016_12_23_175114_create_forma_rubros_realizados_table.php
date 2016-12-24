<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaRubrosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_rubros_realizados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_forma')->unsigned();
            $table->integer('id_rubro_realizado')->unsigned();

            $table->foreign('id_forma')->references('id')->on('formas_pagos')->onDelete('cascade');
            $table->foreign('id_rubro_realizado')->references('id')->on('rubros_realizados')->onDelete('cascade');
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
        Schema::drop('forma_rubros_realizados');
    }
}
