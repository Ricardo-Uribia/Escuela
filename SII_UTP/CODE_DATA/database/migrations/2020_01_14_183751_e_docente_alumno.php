<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EDocenteAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_docente_alumno', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciclo_id');
            $table->unsignedBigInteger('e_pregunta_id');
            $table->unsignedBigInteger('e_respuesta_id');
            $table->unsignedBigInteger('e_plan_id');
            $table->unsignedBigInteger('profesor_grupo_id');
            $table->unsignedBigInteger('gruposalumno_id');
            $table->boolean('status');
            $table->string('resultado', 11);

            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('e_pregunta_id')->references('id')->on('e_preguntas');
            $table->foreign('e_respuesta_id')->references('id')->on('e_respuestas');
            $table->foreign('e_plan_id')->references('id')->on('e_planes');
            $table->foreign('profesor_grupo_id')->references('id')->on('profesor_grupo');
              $table->foreign('gruposalumno_id')->references('id')->on('gruposalumno');
           
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
