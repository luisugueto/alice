<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaPagosRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forma_pagos_realizados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pagos')->unsigned();
            $table->foreign('id_pagos')->references('id')->on('pagos')->onDelete('Cascade');
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
        Schema::drop('forma_pagos_realizados');
    }
}
