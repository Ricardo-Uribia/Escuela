<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='empresas';
    public $timestamps=true;

    public function alumnos()
    {
    	return $this->belongsToMany(Alumnos::class)->withPivot('id','fechaIncio','fechaConclusion','tipoSupervisor','supervisorNombre','fechaReconocimiento' , 'modalidad_id');
    }
    /*
    public function alumnos()
    {
    	return $this->belongsToMany(Alumno::class)->withPivot('fechaIncio','fechaConclusion','tipoSupervisor','supervisorNombre','fechaReconocimiento');
    }*/
}
