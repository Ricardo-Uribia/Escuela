<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('niveles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreNivel');
            $table->string('Identificador')->nullable();
            $table->string('Descripcion_Nivel')->nullable();
            $table->string('Acuerdo_Creacion')->nullable();
            $table->date('Fecha')->nullable();
            $table->integer('Del')->nullable();
            $table->integer('A')->nullable();
           // $table->string('Asignacion_Matriculas')->nullable();
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
        Schema::dropIfExists('niveles');
    }
}
