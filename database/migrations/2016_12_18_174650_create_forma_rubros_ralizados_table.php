<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaRubrosRalizadosTable extends Migration
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
            $table->integer('id_rubro')->unsigned();
            $table->foreign('id_rubro')->references('id')->on('rubros')->onDelete('Cascade');
            $table->integer('id_forma')->unsigned();
            $table->foreign('id_forma')->references('id')->on('formas_pagos')->onDelete('Cascade');
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
