<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planespago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planespago', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('aniocorrespondiente');
            $table->unsignedBigInteger('ciclo_id');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->unsignedBigInteger('conceptopago_id');
            $table->foreign('conceptopago_id')->references('id')->on('conceptopagos');
            $table->string('mes', 255);
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->double('precio',8,2);
            $table->unsignedBigInteger('planespagoMST_id')->unsigned();
            $table->foreign('planespagoMST_id')->references('id')->on('planespagoMST');
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
