<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosgruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnosgrupos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('Paterno', 30);
            $table->string('Materno', 30);
            $table->string('Nombres', 30);
            $table->string('Status', 2);
            $table->string('Genero', 1);
            $table->string('Matricula', 50)->nullable();

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumnos');

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos');

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
        Schema::dropIfExists('alumnosgrupos');
    }
}
