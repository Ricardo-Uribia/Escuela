<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asighorasprofesor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asighorasprofesor', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profesor_id')->nullable();
            $table->unsignedBigInteger('ciclo_id')->nullable();
            $table->string('tipo_profesor', 10)->nullable();
            $table->integer('h_investigacion')->nullable();
            $table->integer('h_admin')->nullable();
            $table->integer('h_docencia')->nullable();
            $table->foreign('profesor_id')->references('id')->on('profesores');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
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
