<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_rubros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_factura')->unsigned();
            $table->integer('id_rubro')->unsigned();

            $table->foreign('id_factura')->references('id')->on('facturacion')->onDelete('cascade');
            $table->foreign('id_rubro')->references('id')->on('rubros')->onDelete('cascade');

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
        Schema::drop('facturas_rubros');
    }
}
