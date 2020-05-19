<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsignatura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Clave_Asignatura')->nullable();
            $table->string('Nombre_Asignatura')->nullable();
            $table->string('Nombre_Corto');
            $table->string('Descripcion')->nullable();
            $table->integer('Cuatrimestre')->nullable();
            $table->string('Horas_Teoria')->nullable();
            $table->string('Horas_Practica')->nullable();
            $table->string('Area_Conocimiento')->nullable();
            $table->string('Tipo_Asignatura')->nullable();
            $table->string('Conta_Promedio')->nullable();
            
             $table->integer('planes_est_id')->unsigned();
            $table->foreign('planes_est_id')->references('id')->on('planes_est');
            
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
        Schema::dropIfExists('materias');
    }
}
