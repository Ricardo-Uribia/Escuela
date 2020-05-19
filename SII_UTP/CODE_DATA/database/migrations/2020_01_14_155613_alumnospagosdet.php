<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnospagosdet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnopagosdet', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('reciboCaja', 255);
            $table->double('precio',8,2);
            $table->unsignedBigInteger('conceptopagos_id')->nullable();
            $table->unsignedBigInteger('alumnocxc_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('planespago_id')->nullable();
            $table->unsignedBigInteger('caja_id')->nullable();
            $table->year('anio');
            $table->string('mes', 255);
            $table->string('cantidad', 255);
            $table->string('recibidoPor', 255);
            $table->foreign('conceptopagos_id')->references('id')->on('conceptopagos');
            $table->foreign('alumnocxc_id')->references('id')->on('alumnocxc');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('planespago_id')->references('id')->on('planespagoMST');
            $table->foreign('caja_id')->references('id')->on('cajas');
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
