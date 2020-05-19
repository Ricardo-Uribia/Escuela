<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TokenFichas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_token_fichas', function(Blueprint $table) {
            $table->bigIncrements('id')->unsigned();        
            $table->string('curp_alumno')->unique();
            $table->string('_token')->unique();
            $table->date('fecha_expira');
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
