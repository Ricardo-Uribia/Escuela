<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Administrativos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativos', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tel_oficina', 255)->nullable();
            $table->string('emergencia_persona', 255)->nullable();
            $table->string('emergencia_tel', 255)->nullable();
            $table->string('trabajo_anterior', 255)->nullable();
            $table->string('cargo_anterior', 255)->nullable();
            $table->unsignedBigInteger('creado_por')->unsigned();
            $table->unsignedBigInteger('editado_por')->unsigned();
            $table->unsignedBigInteger('empleado_id')->unsigned();
            $table->foreign('creado_por')->references('id')->on('users');
            $table->foreign('editado_por')->references('id')->on('users');
            $table->foreign('empleado_id')->references('id')->on('empleados');
        
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
