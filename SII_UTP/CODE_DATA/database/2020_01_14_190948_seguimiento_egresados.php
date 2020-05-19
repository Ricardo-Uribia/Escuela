<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeguimientoEgresados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_egresados', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('ciclo_id');
            $table->string('nombre', 45)->nullable();
            $table->string('estadocivil_egresado', 45)->nullable();
            $table->string('estatus_titulacion', 45)->nullable();
            $table->string('porcentaje_rubros', 45)->nullable();
            $table->string('porcentaje_cual', 45)->nullable();
            $table->string('beca_principal', 45)->nullable();
            $table->decimal('telefono_casa_a', 10, 0)->nullable();
            $table->decimal('celular_a', 10, 0)->nullable();
            $table->decimal('telefono_contacto_a', 45, 0)->nullable();
            $table->string('parentezco_contacto_a', 45)->nullable();
            $table->string('domicilio_particular', 45)->nullable();
            $table->string('colonia_particular', 45)->nullable();
            $table->string('municipio_particular', 45)->nullable();
            $table->string('estado_particular', 45)->nullable();
            $table->string('nombre_empresa', 45)->nullable();
            $table->string('domicilio_laboral', 45)->nullable();
            $table->string('colonia_laboral', 45)->nullable();
            $table->string('municipio_laboral', 45)->nullable();
            $table->string('estado_laboral', 45)->nullable();
            $table->string('domicilio_contacto', 45)->nullable();
            $table->string('colonia_contacto', 45)->nullable();
            $table->string('municipio_contacto', 45)->nullable();
            $table->string('estado_contacto', 45)->nullable();
            $table->string('parentezco_contacto', 45)->nullable();
            $table->string('apartado_postal', 45)->nullable();
            $table->string('email_a', 45)->nullable();
            $table->string('email2', 45)->nullable();
            $table->string('email_laboral', 45)->nullable();
            $table->string('facebook_a', 45)->nullable();
            $table->string('twitter', 45)->nullable();
            $table->string('ref_fam1', 45)->nullable();
            $table->decimal('tel_fam1', 10, 0)->nullable();
            $table->string('email_fam1', 45)->nullable();
            $table->string('ref_fam2', 45)->nullable();
            $table->decimal('tel_fam2', 45, 0)->nullable();
            $table->string('email_fam2', 45)->nullable();
            $table->string('ref_laboral1', 45)->nullable();
            $table->decimal('tel_ref_laboral1', 10, 0)->nullable();
            $table->string('email_ref_laboral1', 45)->nullable();
            $table->string('ref_laboral2', 45)->nullable();
            $table->decimal('tel_ref_laboral2', 10, 0)->nullable();
            $table->string('email_ref_laboral2', 45)->nullable();
            $table->string('ref_escolar1', 45)->nullable();
            $table->decimal('tel_ref_escolar1', 10, 0)->nullable();
            $table->string('email_ref_escolar1', 45)->nullable();
            $table->string('ref_escolar2', 45)->nullable();
            $table->decimal('tel_ref_escolar2', 10, 0)->nullable();
            $table->string('email_ref_escolar2', 45)->nullable();
            $table->string('trabajas_actual', 45)->nullable();
            $table->string('razon_no_trabajo', 45)->nullable();
            $table->string('nombre_jefe', 45)->nullable();
            $table->string('puesto_jefe', 45)->nullable();
            $table->decimal('telefono_jefe', 10, 0)->nullable();
            $table->string('extension_jefe', 45)->nullable();
            $table->string('email_jefe', 45)->nullable();
            $table->string('tiempo_primer_trabajo', 45)->nullable();
            $table->string('regimen_trabajo', 45)->nullable();
            $table->string('o_trabajo', 45)->nullable();
            $table->string('puesto_actual', 45)->nullable();
            $table->string('coincidencia_formacion_ut', 45)->nullable();
            $table->string('ingreso_mensual', 45)->nullable();
            $table->string('medio_obtencion_trabajo', 45)->nullable();
            $table->string('estudias_actual', 45)->nullable();
            $table->string('tipo_institucion_actual', 125)->nullable();
            $table->string('nombre_institucion_actual', 125)->nullable();
            $table->string('nivel_academico_planteado', 125)->nullable();
            $table->string('nombre_institucion_nivel', 125)->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('ciclo_id')->references('id')->on('ciclos');
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
