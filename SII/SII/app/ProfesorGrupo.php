<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfesorGrupo extends Model
{	
	protected $table = 'profesor_grupo';
	protected $primaryKey = 'idProfesorGrupo';
    protected $fillable = ['idProfesorGrupo','idCiclo','id_Grupo','idPlan','idAsignatura','idNivel','idProfesor','p1','p2','p3'];

    public $timestamps = false;

      public function Asignaturas(){
       return $this->belongsTo('App\Models\Asignatura','idAsignatura');
    }

    public function Grupos(){
       return $this->belongsTo('App\Models\Grupos','id_Grupo');
    }

    public function Profesores(){
       return $this->belongsTo('App\Profesor','idProfesor');
    }

     public function Planes(){
       return $this->belongsTo('App\Models\PlanesEst','idPlan');
    }

    public function Ciclos(){
      return $this->belongsTo('App\Models\Ciclo', 'idCiclo');
    }
    public function Niveles(){
      return $this->belongsTo('App\Models\Niveles', 'idNivel');
    }
    
    public function EvaluacionDocente(){
      return $this->belongsTo('App\Models\EvaluacionDocente', 'id_Edoc');
    }
}
