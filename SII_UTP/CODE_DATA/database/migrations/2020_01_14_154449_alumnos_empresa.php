<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnosEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_empresa', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('modalidad_id');
            $table->string('asesor', 45)->nullable();
            $table->date('fecha_incio')->nullable();
            $table->date('fecha_conclusion')->nullable();
            $table->string('tipo_supervisor', 255)->nullable();
            $table->string('nombre_supervisor', 45)->nullable();
            $table->date('fecha_reconocimiento')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos'); 
            $table->foreign('empresa_id')->references('id')->on('empresas'); 
            $table->foreign('modalidad_id')->references('id')->on('modalidades'); 
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
