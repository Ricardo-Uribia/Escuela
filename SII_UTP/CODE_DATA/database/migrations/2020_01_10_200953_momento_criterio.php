<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MomentoCriterio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('momento_criterio', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('momento_id');
            $table->foreign('momento_id')->references('id')->on('momentos');
            $table->unsignedBigInteger('criterio_id');
            $table->foreign('criterio_id')->references('id')->on('criterios');
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
