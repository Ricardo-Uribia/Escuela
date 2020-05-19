<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class EvaluacionDocente extends Model
{ 


	protected $fillable = [
	 	'id_Edoc','idCiclo','idPlaned','idAlumnogrupo','idProfesorGrupo','idPregunta','statused','respuesta'];


	protected $table='alumno_ev_doc';

	protected $primaryKey = 'id_Edoc';

	public $timestamps = false;
	
   
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