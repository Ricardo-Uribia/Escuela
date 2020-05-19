<?php

namespace App\Models\Alumnos;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    public $timestamps = true;

    protected $guarded= [];


   

    public function getTurnoAttribute($turno){
        if ($turno == "M") {
        	return "Matutino";
        }else if($turno == "V"){
        	return "Vespertino";
        }
    }

    public function carrera(){
        return $this->hasOne('App\Models\Configuracion\Carrera','id','carrera_id');
    }
    
    public function profesor(){
    	return $this->hasOne('App\Models\Empleados\Profesores\Profesor','id','profesor_id');	
    }

    public function alumnos(){
        return $this->belongsToMany(Alumno::class,'alumno_grupos')->withTimestamps()->withPivot('id');
    }   

}
