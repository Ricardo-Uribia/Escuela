<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $fillable = [
'id', 'Status', 'Nivel', 'Carrera', 'Folio', 'Notas', 'Paterno', 'Materno', 'Nombres', 'Genero', 'Estado_Civil', 'Fecha_Nac',
'Lugar_Nac', 'Estado_Nac', 'Municipio_Nac', 'Edad', 'Clave_Ciudadana', 'Domicilio', 'Ciudad', 'Municipio',
'Estado', 'CP', 'Telefono', 'Celular', 'Email', 'Persona_Autorizada', 'Parentesco_Autorizada', 'Telefono_Autorizada',
'Misma_Autorizada', 'Contacto', 'Parentesco_Contacto', 'Tel_Contacto', 'Escuela_Procedencia', 'Municipio_Bachillerato',
'Estado_Bachillerato', 'Inicio_Bachillerato', 'Fin_Bachillerato', 'Tipo_Bachillerato', 'Sistema_Bachillerato', 'Promedio_Bachillerato',
'Fecha_Creacion', 'Fecha_Actualizacion', 'Fecha_Registro', 'Fecha_Ingreso', 'Fecha_Egreso', 'Promedio_Admision',
'Solicita_beca', 'Autoriza_Beca', 'Tipo_Beca', 'Folio_Ibecey', 'Folio_Subes', 'Beca_Transporte', 'Origen_Indigena',
'Lengua_Indigena', 'Discapacidad', 'Enfermedad', 'Alergias', 'Peso', 'Talla', 'Nombre_Padre', 'Nombre_Madre', 
'Escolaridad_Padre', 'Escolaridad_Madre', 'Actividad_Padre', 'Actividad_Madre', 'Automovil_Familiar', 'Computadora',
'Tipo_Seg_Med', 'Numero_IMSS', 'Tamano_Casa', 'Ingreso_Familiar', 'Personas_Dependen_Ingreso', 'Viven_En_Casa',
'Hermanos', 'Lugar_Nac_Herm', 'Herm_Estudian', 'Trabajas', 'Act_Trabajas', 'Horario_Trabajo', 'Nombre_Conyuge',
'Escolaridad_Conyuge', 'Actividad_Conyuge', 'Hijos', 'Edad_Hijos0a5', 'Edad_Hijos6a12', 'Edad_Hijos13a18',
'Hijos_Mayores18', 'Ingreso_Percapita', 'Telefono_Trabajo',
   
    ];

    protected $table = 'alumnos';
    public $timestamps = false;
    
    
    public function AlumnosGrupos(){
		return $this->hasMany('App\Models\AlumnosGrupos', 'id');
	}
}
