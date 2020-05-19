<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Modalidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidades', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 255);
            $table->text('descripcion');
            $table->string('nombre_docto_recept', 255);
            $table->unsignedBigInteger('niveles_id');
            $table->foreign('niveles_id')
                ->references('id')->on('niveles');        
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
