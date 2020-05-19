<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('catcuentas', function (Blueprint $table) {
            $table->increments('idCatCuentas');
            $table->string('codigoCuenta');
            $table->text('descripcion', 255)->nullable();
            $table->string('nivel');
            $table->string('acumulativa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catcuentas');
    }
}
