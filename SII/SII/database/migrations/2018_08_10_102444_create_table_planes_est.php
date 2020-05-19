<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlanesEst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_est', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Clave_Plan')->nullable();
            $table->string('Nombre_Plan')->nullable();
            $table->string('Oficio_Auto')->nullable();
            $table->string('Calif_Min')->nullable();
            $table->string('Calif_Max')->nullable();
            $table->string('Min_Aprobatoria')->nullable();
            $table->string('Calc_Promedio')->nullable();
            //$table->string('Decimales')->nullable();
            //$table->string('Redondear')->nullable();
            $table->integer('Carrera_Aplica_id')->unsigned();
            $table->foreign('Carrera_Aplica_id')->references('id')->on('niveles');

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
        Schema::dropIfExists('planes_est');
    }
}
