<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnoPagosDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('alumnopagosdet', function (Blueprint $table) {
            $table->increments('idAlumnoPagosDet');
            $table->date('fecha');
            $table->string('reciboCaja');
            $table->double('precio');


            $table->integer('idConcepto')->unsigned();
            $table->foreign('idConcepto')
                ->references('idConceptosPagos')
                ->on('conceptopago');

            $table->integer('idAlumnoCxC')->unsigned();
            $table->foreign('idAlumnoCxC')
                ->references('idAlumnosCxC')
                ->on('alumnocxc');

            $table->integer('idAlumno')->unsigned();
            $table->foreign('idAlumno')
                ->references('id')
                ->on('alumnos');

            $table->integer('idCiclo')->unsigned();
            $table->foreign('idCiclo')
                ->references('idCiclo')
                ->on('ciclo');

            $table->integer('idPlan')->unsigned()->nullable();
            $table->foreign('idPlan')
                ->references('idPlanesPagoMST')
                ->on('planes_pagomst');

            $table->integer('idCaja')->unsigned()->nullable();
            $table->foreign('idCaja')
                ->references('idCaja')
                ->on('caja');

            $table->year('anio');
            $table->string('mes');
            $table->string('cantidad');
            $table->string('recibidoPor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnopagosdet', function($table)
        {
            $table->dropForeign(['idConcepto']);
            $table->dropColumn(['idConcepto']);

            $table->dropForeign(['idAlumnoCxC']);
            $table->dropColumn(['idAlumnoCxC']);

            $table->dropForeign(['idAlumno']);
            $table->dropColumn(['idAlumno']);

            $table->dropForeign(['idCiclo']);
            $table->dropColumn(['idCiclo']);
            
             $table->dropForeign(['idPlan']);
            $table->dropColumn(['idPlan']);

             $table->dropForeign(['idCaja']);
            $table->dropColumn(['idCaja']);
        });

        Schema::dropIfExists('alumnopagosdet');
    }
}
