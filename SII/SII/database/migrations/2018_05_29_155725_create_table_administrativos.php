<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdministrativos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('administrativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Telefono_Oficina');
            $table->string('Emergencia_Persona');
            $table->string('Emergencia_Telefono');
            $table->string('Trabajo_Anterior');
            $table->string('Cargo_Anterior');
            $table->string('Username')->nullable();
            $table->string('Fecha_Actualizacion')->nullable();
            $table->string('Username_Actualizado')->nullable();
            $table->integer('idEmpleado')->unsigned();


            $table->foreign('idEmpleado')
            ->references('id')
            ->on('empleados');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrativos', function($table)
        {
            $table->dropForeign(['idEmpleado']);
            $table->dropColumn(['idEmpleado']);
        });

        Schema::dropIfExists('administrativos');
    }
}
