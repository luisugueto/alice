<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quimestres', function (Blueprint $table) {
            $table->increments('id');
            $table->date('inicio')->unique();
            $table->date('fin')->unique();
            $table->integer('numero');
            $table->integer('id_periodo')->unsigned();

            $table->foreign('id_periodo')->references('id')->on('periodos')->onDelete('cascade');
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
        Schema::drop('quimestres');
    }
}
