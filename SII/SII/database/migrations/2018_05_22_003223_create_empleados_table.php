<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {

            $table->increments('id');
            $table->string('NombreEmpleado', 100);
            $table->string('txtPaterno' , 100);
            $table->string('txtMaterno' , 100);
            $table->string('NumEmpleado', 30);

            $table->integer('idUser')->unsigned()->nullable();
            $table->foreign('idUser')
            ->references('id')
            ->on('users');

            $table->string('foto', 255)->nullable(); 
            $table->string('genero',1);
            $table->date('fechaNacimiento');

            $table->integer('Estado_Nacimiento_ID')->unsigned();
            $table->foreign('Estado_Nacimiento_ID')
            ->references('id')
            ->on('estados');
            $table->integer('municipioNacimiento')->unsigned();
            $table->foreign('municipioNacimiento')
            ->references('id')
            ->on('towns');

            $table->string('domicilio', 100)->nullable();

            $table->integer('Estado_Actual_ID')->unsigned();
            $table->foreign('Estado_Actual_ID')
            ->references('id')
            ->on('estados');
            $table->integer('municipioActual')->unsigned();
            $table->foreign('municipioActual')
            ->references('id')
            ->on('towns');

            $table->char('estadoCivil', 1);
            $table->string('numeroSeguroSocial', 35);
            $table->string('cedulaFiscal', 20);
            $table->string('claveCiudadana', 30);   
            $table->string('cp', 10);
            $table->string('telefono',30)->nullable();
            $table->string('celular', 30)->nullable();
            $table->string('email', 255);      
            $table->date('fecha_Ingreso');
            $table->date('fecha_Baja')->nullable();
            $table->string('departamento',100)->nullable();
            $table->string('cargo',50);
            $table->string('contrato', 10);
            $table->double('sueldo');
            $table->string('nivelEstudios', 50);
            $table->string('especialidad', 50);
            $table->char('titulado', 1);
            $table->string('institucionEstudios', 50);
            $table->string('cedulaProfecional',50); 
            $table->text('notasDescripcion')->nullable();
            $table->string('tipo')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::table('empleados', function($table)
        {
            $table->dropForeign(['idUser']);
            $table->dropColumn(['idUser']);

            $table->dropForeign(['Estado_Nacimiento_ID']);
            $table->dropColumn(['Estado_Nacimiento_ID']);

            $table->dropForeign(['municipioNacimiento']);
            $table->dropColumn(['municipioNacimiento']);

            $table->dropForeign(['Estado_Actual_ID']);
            $table->dropColumn(['Estado_Actual_ID']);

            $table->dropForeign(['municipioActual']);
            $table->dropColumn(['municipioActual']);

        });

        Schema::dropIfExists('empleados');
    }
}
