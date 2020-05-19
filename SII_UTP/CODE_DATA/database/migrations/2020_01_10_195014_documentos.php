<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nombre', 45)->nullable();
            $table->text('descripcion');
            $table->string('recibido', 45)->nullable()->default('S');;
            $table->string('copia', 45)->nullable();
            $table->string('validado', 45)->nullable();
            $table->timestamp('fecha_recepcion');
            $table->date('fecha_prestamo')->nullable();
            $table->string('devolucion', 45)->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->string('observaciones', 45)->nullable();
            $table->string('archivo', 45);
            $table->unsignedBigInteger('alumno_id');
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
        //
    }
}
