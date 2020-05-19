<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 255);
            $table->text('descripcion')->nullable();
            $table->string('nivel', 255);
            $table->string('acumulativa', 255);
        
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
