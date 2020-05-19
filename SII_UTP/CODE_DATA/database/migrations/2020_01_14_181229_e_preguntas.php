<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EPreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_preguntas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('e_planed_id');
            $table->unsignedBigInteger('e_rubros_id');
            $table->integer('numero')->nullable();
            $table->string('clave', 255)->nullable();
            $table->string('pregunta', 255)->nullable();
            $table->foreign('e_planed_id')->references('id')->on('e_planes');
            $table->foreign('e_rubros_id')->references('id')->on('e_rubros'); 
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
        Schema::drop('e_preguntased');

    }
}
