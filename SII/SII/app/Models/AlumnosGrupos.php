<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumnosGrupos extends Model
{
     protected $fillable = [
 'Paterno', 'Materno', 'Nombres', 'Status','Genero','Matricula',
   
    ];

    protected $table = 'alumnosgrupos';
    protected $primaryKey = 'id';
    
    public $timestamps = false;
    
    public function Evaluaciondocente(){
			return $this->hasMany('App\Models\EvaluacionDocente', 'id');
	}

	public function Alumnos(){
		return $this->belongsTo('App\Models\Alumnos', 'id_alumno');
	}

	public function Grupos(){
		return $this->belongsTo('App\Models\Grupos', 'id_grupo');
	}
}
