<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{	 
	 protected $table = 'asignatura';
	 protected $primaryKey = 'idAsignatura';
     protected $fillable = ['idAsignatura','idPlanEst','clave_asignatura','nombre_asignatura','nombre_corto','descripcion','cuatrimestre','horas_teoricas','horas_practicas','area_conocimiento','tipo_asignatura','contar_promedio'];
     public $timestamps = false;

    

     public function ProfesorGrupo(){
    	$this->hasMany('App\ProfesorGrupo','idAsignatura');
    }

    public static function asignaturas($id){
    	return Asignatura::where('idPlanEst', '=', $id)->get();
    }

}
