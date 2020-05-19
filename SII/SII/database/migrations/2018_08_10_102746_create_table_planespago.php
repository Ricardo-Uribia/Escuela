<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlanespago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planespago', function (Blueprint $table) {
            $table->increments('idPlanesPago');
            $table->year('anioCorresponde');

            $table->integer('idCiclo')->unsigned();
            $table->foreign('idCiclo')
                ->references('idCiclo')
                ->on('ciclo');

            $table->integer('idConceptoPago')->unsigned();
            $table->foreign('idConceptoPago')
                ->references('idConceptosPagos')
                ->on('conceptopago');

            $table->string('mes');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->double('precio');

            $table->integer('idPlanesPagoMST')->unsigned();
            $table->foreign('idPlanesPagoMST')
                ->references('idPlanesPagoMST')
                ->on('planes_pagomst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planespago', function($table)
        {
            $table->dropForeign(['idCiclo']);
            $table->dropColumn(['idCiclo']);

            $table->dropForeign(['idConceptoPago']);
            $table->dropColumn(['idConceptoPago']);

            $table->dropForeign(['idPlanesPagoMST']);
            $table->dropColumn(['idPlanesPagoMST']);
        });
        Schema::dropIfExists('planes_pagomst');
    }
}
