<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfesores extends Migration
{
   public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ClaveProfesor', 10);
            $table->INTEGER('HorasAdmin');
            $table->INTEGER('HorasInvestigacion');
            $table->INTEGER('HorasDocencia');
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
         Schema::table('profesores', function($table)
        {
            $table->dropForeign(['idEmpleado']);
            $table->dropColumn(['idEmpleado']);
        });

        Schema::dropIfExists('profesores');
    }
}
