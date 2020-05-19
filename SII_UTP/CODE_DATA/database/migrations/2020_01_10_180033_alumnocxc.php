<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnocxc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnocxc', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('conceptopago_id')->nullable();
            $table->foreign('conceptopago_id')->references('id')->on('conceptopagos');
            $table->string('pagado', 255);
            $table->unsignedBigInteger('ciclo_id');
             $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->string('inicial', 4)->nullable();
            $table->string('final', 4)->nullable();
            $table->integer('periodo')->nullable();
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->unsignedBigInteger('planespagoMST_id')->nullable();
            $table->foreign('planespagoMST_id')->references('id')->on('planespagoMST');
            $table->year('anio');
            $table->string('mes', 255);
            $table->double('cantidadProgramada',8,2);
            $table->double('cantidadPagada',8,2);
            $table->string('folio', 255)->nullable();
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
