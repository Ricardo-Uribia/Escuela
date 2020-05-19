<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDocente extends Model
{
  
	protected $table='e_docente_alumno';
	public $timestamps = true;
	
   
     public function AlumnosGrupos(){

			return $this->belongsTo('App\Models\AlumnosGrupos','idAlumnogrupo');
	}

		public function Ciclo(){
		 return $this->belongsTo('App\Models\Ciclo', 'idCiclo');
	}

	public function Planed(){
		return $this->hasMany('App\Models\Planed', 'idPlaned');
	}
	
	public function Profesor_Grupo(){
		return $this->hasMany('App\Models\ProfesorGrupo','idProfesor_Grupo');
	}
}
