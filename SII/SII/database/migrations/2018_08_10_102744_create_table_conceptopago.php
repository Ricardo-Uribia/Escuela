<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConceptopago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptopago', function (Blueprint $table) {
            $table->increments('idConceptosPagos');
            $table->string('codigoConcepto');
            $table->text('descripcion', 255)->nullable();
            $table->double('precio');

            $table->integer('idCuenta')->unsigned();
            $table->foreign('idCuenta')
                ->references('idCatCuentas')
                ->on('catcuentas');

            $table->double('impuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conceptopago', function($table)
        {
            $table->dropForeign(['idCuenta']);
            $table->dropColumn(['idCuenta']);
        });

        Schema::dropIfExists('conceptopago');
    }
}
