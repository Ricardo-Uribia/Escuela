<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciclo_id');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->unsignedBigInteger('tipoevento_id');
            $table->foreign('tipoevento_id')->references('id')->on('tipoevento');
            $table->string('descripcion', 200)->nullable();
            $table->string('categoria', 45)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->string('hora_inicio', 45)->nullable();
            $table->string('hora_termino', 45)->nullable();
            $table->string('estatus')->nullable();
            $table->decimal('cupo_minimo', 10, 0)->nullable();
            $table->decimal('cupo_maximo', 10, 0)->nullable();
            $table->string('sede', 200)->nullable();
            $table->string('titular', 45)->nullable();
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
