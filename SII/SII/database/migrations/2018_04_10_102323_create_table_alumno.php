<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Status', 2);
            $table->string('Nivel', 10);
            $table->string('Carrera', 50);
            $table->string('Folio', 20)->nullable(); //nullable
            $table->string('Notas', 150)->nullable(); //nullable
            $table->string('Paterno', 30);
            $table->string('Materno', 30);
            $table->string('Nombres', 30);
            $table->string('Genero', 1);
            $table->string('Estado_Civil', 1);
            $table->date('Fecha_Nac');
            $table->string('Lugar_Nac', 100);
            $table->string('Estado_Nac', 100);
            $table->string('Municipio_Nac', 100);
            $table->integer('Edad');
            $table->string('Clave_Ciudadana', 30);
            $table->string('Domicilio', 100);
            $table->string('Ciudad', 100);
            $table->string('Municipio', 100);
            $table->string('Estado', 100);
            $table->string('CP', 10);
            $table->string('Telefono', 20)->nullable(); //nullable  //string
            $table->string('Celular', 20); //string
            $table->string('Email', 100);
            $table->string('Persona_Autorizada', 100);
            $table->string('Parentesco_Autorizada', 100);
            $table->string('Telefono_Autorizada', 20)->nullable(); //nullable  //string
            $table->string('Misma_Autorizada', 2);
            $table->string('Contacto', 25)->nullable();
            $table->string('Parentesco_Contacto', 20)->nullable();
            $table->string('Tel_Contacto')->nullable(); //nullable  //string
            $table->string('Escuela_Procedencia', 100);
            $table->string('Municipio_Bachillerato', 100);
            $table->string('Estado_Bachillerato', 100);
            $table->string('Inicio_Bachillerato', 50);
            $table->string('Fin_Bachillerato', 50);
            $table->string('Tipo_Bachillerato', 20);
            $table->string('Sistema_Bachillerato', 50);
            $table->double('Promedio_Bachillerato');
            $table->date('Fecha_Creacion')->nullable();
            $table->date('Fecha_Actualizacion')->nullable();
            $table->date('Fecha_Registro')->nullable();
            $table->date('Fecha_Ingreso')->nullable();
            $table->date('Fecha_Egreso')->nullable();
            $table->double('Promedio_Admision')->nullable();
            $table->string('Solicita_beca', 2)->nullable();
            $table->string('Autoriza_Beca', 2)->nullable();
            $table->string('Tipo_Beca', 10)->nullable();
            $table->integer('Folio_Ibecey')->nullable();
            $table->integer('Folio_Subes')->nullable();
            $table->string('Beca_Transporte', 2)->nullable();
            $table->string('Origen_Indigena', 2);
            $table->string('Lengua_Indigena', 2);
            $table->string('Discapacidad', 100);
            $table->string('Enfermedad', 30);
            $table->string('Alergias', 30);
            $table->integer('Peso');
            $table->string('Talla', 5);
            $table->string('Nombre_Padre', 50);
            $table->string('Nombre_Madre', 50);
            $table->string('Escolaridad_Padre', 50);
            $table->string('Escolaridad_Madre', 50);
            $table->string('Actividad_Padre', 60);
            $table->string('Actividad_Madre', 60);
            $table->string('Automovil_Familiar', 2);
            $table->string('Computadora', 2);
            $table->string('Tipo_Seg_Med', 20);
            $table->string('Numero_IMSS', 20);
            $table->string('Tamano_Casa', 40);
            $table->integer('Ingreso_Familiar');
            $table->integer('Personas_Dependen_Ingreso');
            $table->integer('Viven_En_Casa');
            $table->integer('Hermanos');
            $table->string('Lugar_Nac_Herm', 50);
            $table->integer('Herm_Estudian');
            $table->string('Trabajas', 2);
            $table->string('Act_Trabajas', 100)->nullable(); //nullable
            $table->string('Horario_Trabajo')->nullable(); //nullable
            $table->string('Nombre_Conyuge', 100)->nullable();
            $table->string('Escolaridad_Conyuge', 100)->nullable();
            $table->string('Actividad_Conyuge', 100)->nullable();
            $table->string('Hijos', 2); 
            $table->integer('Edad_Hijos0a5')->nullable();
            $table->integer('Edad_Hijos6a12')->nullable();
            $table->integer('Edad_Hijos13a18')->nullable();
            $table->integer('Hijos_Mayores18')->nullable();
            $table->double('Ingreso_Percapita')->nullable(); //nullable
            $table->string('Telefono_Trabajo', 20)->nullable(); //nulable  //rango de numero
            $table->string('Matricula', 50)->nullable();
            $table->string('Grupo', 50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('alumnos');
    }
}
