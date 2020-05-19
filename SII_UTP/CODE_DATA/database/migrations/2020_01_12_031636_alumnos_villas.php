<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnosVillas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_villas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->unsignedBigInteger('alumno_grupo_id')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('costo_viaje', 50)->nullable();
            $table->string('tiempo_viaje', 50)->nullable();
            $table->string('observaciones_villa', 125)->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('alumno_grupo_id')->references('id')->on('gruposalumno');
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
