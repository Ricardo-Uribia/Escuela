<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoKardex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_kardex', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->unsignedBigInteger('nivel_id')->nullable();
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->unsignedBigInteger('profesor_grupo_id')->nullable();
            $table->unsignedBigInteger('momento_id')->nullable();
            $table->unsignedBigInteger('criterio_id')->nullable();
            $table->integer('valor')->nullable();
            $table->string('comentario', 255)->nullable();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
            $table->foreign('nivel_id')->references('id')->on('niveles');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('profesor_grupo_id')->references('id')->on('profesor_grupo');
            $table->foreign('momento_id')->references('id')->on('momentos');
            $table->foreign('criterio_id')->references('id')->on('criterios');
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
