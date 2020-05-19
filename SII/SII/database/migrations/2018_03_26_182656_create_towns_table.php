<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
            ->references('id')
            ->on('ESTADOS');
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

        Schema::table('towns', function($table)
        {
            $table->dropForeign(['state_id']);
            $table->dropColumn(['state_id']);
        });
        Schema::dropIfExists('towns');
    }
}
