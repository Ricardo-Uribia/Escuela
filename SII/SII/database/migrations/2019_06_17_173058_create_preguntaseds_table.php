<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreguntasedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntased', function (Blueprint $table) {
            $table->increments('idpreguntaed');
            $table->timestamps();
            $table->integer('idpreguntaed');
            $table->integer('idplaned');
            $table->integer('numero');
            $table->string('clavepregunta');
            $table->string('preguntas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('preguntased');
    }
}
