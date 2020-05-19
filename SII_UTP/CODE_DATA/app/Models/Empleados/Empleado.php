<?php

namespace App\Models\Empleados;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    public $timestamps = true;

    public function Profesor(){
       return $this->hasOne('App\Models\Empleados\Profesores\Profesor');
    }
 
 	public function nombreCompleto(){
 		return $this->nombre." ".$this->ap_paterno." ".$this->ap_materno;
 	}

}
