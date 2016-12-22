<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->double('monto', 10,2);
            $table->date('fecha');
            $table->integer('id_curso')->unsigned();
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('Cascade');
            $table->integer('id_periodo')->unsigned();
            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('Cascade');
            $table->timestamps();
            // $table->integer('id_estudiante')->unsigned();
            // $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('Cascade');
            // $table->integer('id_factura')->unsigned();
            // $table->foreign('id_factura')->references('id')->on('facturacion')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rubros');
    }
}
