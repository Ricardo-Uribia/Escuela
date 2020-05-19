<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Matricula')->nullable();
            $table->string('Nivel');
            $table->string('Nombre');
            $table->string('Genero');
            $table->string('Status')->nullable();
            $table->string('Grupo')->nullable();
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
        Schema::dropIfExists('listas');
    }
}
