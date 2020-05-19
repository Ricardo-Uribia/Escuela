<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Niveles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('identificador', 255)->nullable();
            $table->string('nivel', 100)->nullable();
            $table->string('abr_nivel', 255)->nullable();
            $table->string('descrip_nivel', 255)->nullable();
            $table->string('acuerdo_creacion', 255)->nullable();
            $table->date('fecha')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
           
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
