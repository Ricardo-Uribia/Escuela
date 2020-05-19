<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeds', function (Blueprint $table) {
            $table->increments('idplaned');
            $table->timestamps();
            $table->integer('idplaned');
            $table->string('claveplaned');
            $table->string('nombre');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planed');
    }
}
