<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ciclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclos', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->year('inicia');
            $table->year('finaliza');
            $table->integer('periodo');
            $table->text('descripcion')->nullable();
            $table->string('codigo_corto', 255);
            $table->date('fecha_inicial');
            $table->date('fecha_fin');
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
