<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivelacion', function (Blueprint $table) {
            $table->increments('id');
            $table->double('recuperacion');
            $table->double('supletorio');
            $table->double('remedial');
            $table->double('gracia');
            $table->integer('id_estudiante')->unsigned();

            $table->foreign('id_estudiante')->references('id')->on('datos_generales_estudiante')->onDelete('cascade');
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
        Schema::drop('nivelacion');
    }
}
