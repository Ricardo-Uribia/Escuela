<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('empleados', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 45);
            $table->string('ap_paterno', 45);
            $table->string('ap_materno', 45);
            $table->string('num_empleado', 30)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('genero', 1);
            $table->date('fecha_nacimiento');
            $table->string('domicilio', 45);
            $table->char('estado_civil', 1);
            $table->string('nss', 20)->nullable();
            $table->string('cedula_fiscal', 20)->nullable();
            $table->string('clave_ciudadana', 20);
            $table->string('telefono', 10)->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('email', 45)->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_baja')->nullable();
            $table->string('departamento', 45)->nullable();
            $table->string('cargo', 54)->nullable();
            $table->string('contrato', 10)->nullable();
            $table->double('sueldo', 8,2)->nullable();
            $table->string('nivel_estudios', 50)->nullable();
            $table->string('especialidad', 50)->nullable();
            $table->boolean('titulado')->nullable();
            $table->string('institucion_estudios', 50)->nullable();
            $table->string('cedula_profecional', 50)->nullable();
            $table->string('doc_cedula_profecional', 50)->nullable();
            $table->text('notas_descripcion')->nullable();
            $table->integer('tipo')->nullable();
            $table->char('status_actual', 5)->nullable();
            $table->string('depto_anterior', 45)->nullable();
            $table->string('cargo_anterior', 45)->nullable();
            $table->string('empresa_anterior', 45)->nullable();
            $table->boolean('maestria')->nullable();
            $table->string('nombre_maestria', 45)->nullable();
            $table->string('institucion_maestria', 45)->nullable();
            $table->string('doc_titul_maestria', 45)->nullable();
            $table->string('doc_cedula_maestria', 45)->nullable();
            $table->boolean('doctorado')->nullable();
            $table->string('nombre_doctorado', 45)->nullable();
            $table->string('institucion_doctorado', 45)->nullable();
            $table->string('doc_titul_doctorado', 45)->nullable();
            $table->string('doc_cedula_doctorado', 45)->nullable();
            $table->boolean('post_doctorado')->nullable();
            $table->string('nombre_post_doctorado', 45)->nullable();
            $table->string('institucion_post_doctorado', 45)->nullable();
            $table->string('doc_titul_post_doctorado', 45)->nullable();
            $table->string('doc_cedula_post_doctorado', 45)->nullable();
            $table->string('municipio_nacimiento', 45)->nullable();
            $table->string('municipio_actual', 45)->nullable();
            $table->string('ciudad_actual', 45)->nullable();
            $table->unsignedBigInteger('estado_nacimiento_id');
            $table->unsignedBigInteger('estado_id_actual');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('estado_nacimiento_id')->references('id')->on('estados');
            $table->foreign('estado_id_actual')->references('id')->on('estados');
            $table->foreign('user_id')->references('id')->on('users');

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
