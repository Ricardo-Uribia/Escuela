<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnocxc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('alumnocxc', function (Blueprint $table) {
            $table->increments('idAlumnosCxC');

            $table->integer('idConcepto')->unsigned();
            $table->foreign('idConcepto')
                ->references('idConceptosPagos')
                ->on('conceptopago');

            $table->string('pagado');

            $table->integer('idCiclo')->unsigned();
            $table->foreign('idCiclo')
                ->references('idCiclo')
                ->on('ciclo');

           
            $table->year('inicial')->nullable();
            $table->year('final')->nullable();
            $table->integer('periodo')->nullable();

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')
                ->references('id')
                ->on('alumnos');

            $table->integer('idPlan')->unsigned()->nullable();
            $table->foreign('idPlan')
                ->references('idPlanesPagoMST')
                ->on('planes_pagomst');

            $table->year('anio');
            $table->string('mes');
            $table->double('cantidadProgramada');
            $table->double('cantidadPagada')->nullable();
            $table->string('folio')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnocxc', function($table)
        {
            $table->dropForeign(['idConcepto']);
            $table->dropColumn(['idConcepto']);

            $table->dropForeign(['idAlumno']);
            $table->dropColumn(['idAlumno']);

            $table->dropForeign(['idCiclo']);
            $table->dropColumn(['idCiclo']);

            $table->dropForeign(['idPlan']);
            $table->dropColumn(['idPlan']);
        });
        
        Schema::dropIfExists('alumnocxc');
    }
}
