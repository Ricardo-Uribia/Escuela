<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCiclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ciclo', function (Blueprint $table) {
            $table->increments('idCiclo');
            $table->year('inical');
            $table->year('final');
            $table->integer('periodo');
            $table->text('descripcion', 255)->nullable();
            $table->string('codigoCorto');
            $table->date('fechaInicial');
            $table->date('fechaFinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclo');
    }
}
