<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('caja', function (Blueprint $table) {
            $table->increments('idCaja');
            $table->text('descripcion', 255)->nullable();
            $table->char('status', 5);
            $table->integer('consecutivo');

            $table->integer('username')->unsigned()->nullable();
            $table->foreign('username')
                ->references('id')
                ->on('empleados');

            $table->integer('idCuenta')->unsigned();
            $table->foreign('idCuenta')
                ->references('idCatCuentas')
                ->on('catcuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caja', function($table)
        {
            $table->dropForeign(['username']);
            $table->dropColumn(['username']);

             $table->dropForeign(['idCuenta']);
            $table->dropColumn(['idCuenta']);
        });
        Schema::dropIfExists('caja');
    }
}
