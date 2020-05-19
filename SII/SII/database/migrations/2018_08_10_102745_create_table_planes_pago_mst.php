<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlanesPagoMst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('planes_pagomst', function (Blueprint $table) {
            $table->increments('idPlanesPagoMST');
            $table->integer('idCiclo')->unsigned();
            $table->foreign('idCiclo')
                ->references('idCiclo')
                ->on('ciclo');

            $table->string('codigoPlan');
            $table->text('descripcion', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planes_pagomst', function($table)
        {
            $table->dropForeign(['idCiclo']);
            $table->dropColumn(['idCiclo']);
        });
        Schema::dropIfExists('planes_pagomst');
    }
}
