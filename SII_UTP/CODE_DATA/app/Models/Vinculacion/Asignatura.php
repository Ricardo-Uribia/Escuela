<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    public $timestamps = true;

    public function ProfesorGrupo(){
    	$this->hasMany('App\ProfesorGrupo','idAsignatura');
    }

    public static function asignaturas($id){
    	return Asignatura::where('idPlanEst', '=', $id)->get();
    }
}
