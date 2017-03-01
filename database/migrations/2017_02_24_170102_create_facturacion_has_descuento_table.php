<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionHasDescuentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacion_has_descuento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_factura')->unsigned();
            $table->foreign('id_factura')->references('id')->on('rubros_realizados')->onDelete('Cascade');
            $table->double('descuento', 10, 2);
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
        Schema::drop('facturacion_has_descuento');
    }
}
