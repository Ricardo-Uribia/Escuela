<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoKardex extends Model
{
	protected $table = 'alumno_kardex';
	protected $primaryKey = 'idAlumnoKardex';
	protected $fillable = ['idAlumnoKardex','idCiclo','idAlumno','idNivel','idGrupo','idPlan','idAsignatura','idProfesor','idMomento','idCriterio','valor','comentario'];
	public $timestamps = false;

}
