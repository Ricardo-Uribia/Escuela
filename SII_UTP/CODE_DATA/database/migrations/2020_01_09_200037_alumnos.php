<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('folio_alumno_reg_id')->nullable()->unique();
            $table->foreign('folio_alumno_reg_id')->references('id')->on('folios_alumno');
            $table->string('matricula')->nullable()->unique();            
            $table->string('paterno', 30)->nullable();
            $table->string('materno', 30)->nullable();
            $table->string('nombres')->nullable();
            $table->string('genero', 2);
            $table->integer('edad')->nullable();
            $table->string('telefono')->nullable();            
            $table->string('celular')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('curp', 18)->nullable()->unique();
            $table->string('fotografia')->nullable();
            $table->string('estado_civil', 2);
            $table->date('fecha_nac')->nullable();
            $table->unsignedBigInteger('estado_nac_id');
            $table->foreign('estado_nac_id')->references('id')->on('estados');
            $table->string('ciudad')->nullable();
            $table->string('municipio_nac')->nullable();
            $table->string('domicilio')->nullable();
            $table->decimal('promedio_admision',2,1)->nullable();
            $table->string('escuela_procedencia')->nullable();
            $table->string('tipo_bachillerato')->nullable();
            $table->string('sistema_bachillerato')->nullable();
            $table->date('inicio_bachillerato')->nullable();
            $table->date('fin_bachillerato')->nullable();
            $table->decimal('promedio_bachillerato',2,1)->nullable();
            $table->string('municipio_bachillerato')->nullable();
            $table->string('municipio')->nullable(); //donde vives
            $table->string('cp')->nullable();
            $table->string('contacto')->nullable();
            $table->string('tel_contacto')->nullable();
            $table->string('parentesco_contacto')->nullable();
            $table->string('persona_autorizada')->nullable();
            $table->string('parentesco_autorizada')->nullable();
            $table->string('telefono_autorizada')->nullable();
            $table->boolean('misma_autorizada')->nullable();
            $table->timestamp('fecha_registro');
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_egreso')->nullable();
            $table->string('egreso_inicial')->nullable();
            $table->string('egreso_final')->nullable();
            $table->boolean('solicita_beca_utp')->nullable();
            $table->boolean('autoriza_beca_utp')->nullable();
            $table->string('tipo_beca_utp')->nullable();
            $table->boolean('tuvo_beca_bachillerato')->nullable(); 
            $table->string('tipo_beca_bachillerato')->nullable();   
            $table->integer('folio_subes')->nullable();
            $table->integer('folio_ceneval')->nullable();
            $table->boolean('origen_indigena')->nullable();
            $table->boolean('lengua_indigena')->nullable();
            $table->string('lengua_indigena_hablante')->nullable();            
            $table->boolean('discapacidad')->nullable();
            $table->string('tipo_discapacidad')->nullable();
            $table->boolean('enfermedad')->nullable();
            $table->boolean('alergias')->nullable();
            $table->string('tipo_alergia')->nullable();
            $table->integer('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('nombre_enfermedad')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->boolean('automovil_familiar')->nullable();
            $table->boolean('computadora')->nullable();
            $table->string('tipo_seg_medico')->nullable();
            $table->string('numero_imss')->nullable()->unique();
            $table->integer('num_imss_verificador')->nullable();
            $table->string('tamano_casa')->nullable();
            $table->float('ingreso_familiar')->nullable();
            $table->integer('viven_en_casa')->nullable();
            $table->integer('personas_dependen_ingreso')->nullable();
            $table->decimal('ingreso_percapita',10,2)->nullable(); //percapita 
            $table->boolean('tiene_hermanos')->nullable();            
            $table->integer('num_hermanos')->nullable();            
            $table->integer('num_hermanos_estudian')->nullable();            
            $table->boolean('trabajas')->nullable();            
            $table->string('horario_trabajo')->nullable();
            $table->string('telefono_trabajo')->nullable();
            $table->string('nombre_conyuge')->nullable();
            $table->boolean('hijos')->nullable();
            $table->integer('0_5')->nullable();
            $table->integer('6_12')->nullable();
            $table->integer('13_18')->nullable();
            $table->integer('mayor_18')->nullable();            
            $table->integer('alumno_altainicial')->nullable();// cuatrimestre?
            $table->integer('alumno_altaperiodo')->nullable(); //1 cuatri -2-4-5-6-7-8-9-10-11
            $table->string('nacionalidad')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('motivo_baja')->nullable();
            $table->integer('alumno_altafinal')->nullable();
            $table->string('email_alterno')->nullable();
            $table->integer('anio_egreso')->nullable();
            $table->string('egreso_periodo')->nullable();
            $table->string('acepto_terminos_documentos',1)->nullable();
            
            $table->unsignedBigInteger('creado_por_id')->nullable();;
            $table->unsignedBigInteger('actualizado_por_id')->nullable();;
            $table->unsignedBigInteger('actividad_trabajo_id')->nullable();;
            $table->unsignedBigInteger('escolaridad_conyuge_id')->nullable();;
            $table->unsignedBigInteger('actividad_conyuge_id')->nullable();;
            $table->unsignedBigInteger('escolaridad_padre_id')->nullable();;
            $table->unsignedBigInteger('escolaridad_madre_id')->nullable();;
            $table->unsignedBigInteger('actividad_padre_id')->nullable();;
            $table->unsignedBigInteger('actividad_madre_id')->nullable();;
            $table->unsignedBigInteger('cfgstatus_id');
            $table->unsignedBigInteger('estado_bachillerato_id');            
            $table->unsignedBigInteger('estado_id');
            $table->string('notas')->nullable();
            $table->string('_token_registro')->nullable()->unique();
            
            $table->foreign('cfgstatus_id')->references('id')->on('cfgstatus');            
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('estado_bachillerato_id')->references('id')->on('estados');
            $table->foreign('escolaridad_padre_id')->references('id')->on('escolaridades');
            $table->foreign('escolaridad_madre_id')->references('id')->on('escolaridades');
            $table->foreign('actividad_padre_id')->references('id')->on('actividades_trabajo');
            $table->foreign('actividad_madre_id')->references('id')->on('actividades_trabajo');
            $table->foreign('actividad_trabajo_id')->references('id')->on('actividades_trabajo');
            $table->foreign('escolaridad_conyuge_id')->references('id')->on('escolaridades');
            $table->foreign('actividad_conyuge_id')->references('id')->on('actividades_trabajo');
            $table->foreign('creado_por_id')->references('id')->on('users');
            $table->foreign('actualizado_por_id')->references('id')->on('users');
            $table->timestamps();

            //$table->string('lugar_nac')->nullable();

            //$table->date('fecha_creacion')->nullable();
            //$table->date('fecha_actualizacion')->nullable();
            //$table->boolean('beca_transporte')->nullable();
        
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
