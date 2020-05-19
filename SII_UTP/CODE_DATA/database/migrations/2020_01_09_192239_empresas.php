<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('servicio_social', 2)->nullable();
            $table->char('institucion_educa', 2)->nullable();
            $table->char('proveedor', 2)->nullable();
            $table->char('bolsa_trabajo', 2)->nullable();
            $table->string('nombre', 255);
            $table->string('rfc', 255);
            $table->string('domicilio', 255)->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('ciudad', 255);
            $table->string('cp', 255);
            $table->string('colonia', 255)->nullable();
            $table->string('status', 255);
            $table->string('numero_convenio', 255);
            $table->string('telefono', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('area_enlace', 255);
            $table->string('enlace_coordinador', 255);
            $table->string('enlace_coordinador_puesto', 255);
            $table->date('fecha_convenio');
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
