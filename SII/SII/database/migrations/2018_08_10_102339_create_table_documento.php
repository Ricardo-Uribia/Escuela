<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('descripcion');
            $table->string('recibido')->nullable();
            $table->string('copia')->nullable();
            $table->string('validado')->nullable();
            $table->date('fecha_recepcion');
            $table->date('fecha_prestamo')->nullable();
            $table->string('devolucion')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->string('observaciones')->nullable();
            
            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');
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
        Schema::dropIfExists('documentos');
    }
}
