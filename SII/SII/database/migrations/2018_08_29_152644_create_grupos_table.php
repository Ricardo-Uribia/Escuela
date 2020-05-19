<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('Ciclo_Escolar')->nullable();
            $table->string('Codigo_Grupo')->nullable();
            $table->string('Tipo_Grupo')->nullable();
            $table->integer('Cupo_Maximo')->nullable();
            $table->string('Turno')->nullable();

            $table->integer('id_Carrera')->unsigned();
            $table->foreign('id_Carrera')->references('id')->on('niveles');

            $table->string('Cuatrimestre')->nullable();
            $table->string('Diferenciador_Grupo')->nullable();

            $table->integer('id_Profesor')->unsigned();
            $table->foreign('id_Profesor')->references('id')->on('empleados');

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
        Schema::dropIfExists('grupos');
    }
}
