<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Planestudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planestudio', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('niveles');
            $table->string('clave', 50)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->string('oficio_auto', 255)->nullable();
            $table->integer('calif_min')->nullable();
            $table->integer('calif_max')->nullable();
            $table->integer('min_aprobatoria')->nullable();
            $table->string('calc_promedio', 20)->nullable();
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
