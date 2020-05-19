<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Extracurriculares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extracurriculares', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('alumno_grupo')->nullable();
            $table->string('descripcion',45)->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('evento_id')->references('id')->on('evento');
            $table->foreign('alumno_grupo')->references('id')->on('gruposalumno');
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
