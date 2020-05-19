<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('planestudio_id');
            $table->foreign('planestudio_id')->references('id')->on('planestudio');
            $table->string('clave', 150)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('nombre_corto', 100)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->integer('cuatrimestre')->nullable();
            $table->string('horas_teoricas', 20)->nullable();
            $table->string('horas_practicas', 20)->nullable();
            $table->string('area_conocimiento', 255)->nullable();
            $table->string('tipo_asignatura', 150)->nullable();
            $table->string('contar_promedio', 20)->nullable();
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
