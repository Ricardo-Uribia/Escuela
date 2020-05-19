<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Grupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('codigo', 255)->nullable();
            $table->string('tipo', 255)->nullable();
            $table->integer('cupo_maximo')->nullable();
            $table->string('turno', 255)->nullable();
            $table->unsignedBigInteger('carrera_id')->nullable();
            $table->foreign('carrera_id')->references('id')->on('carreras');
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->string('cuatrimestre', 255)->nullable();
            $table->string('diferenciador', 255)->nullable();
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesores');
            
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
        //
    }
}
