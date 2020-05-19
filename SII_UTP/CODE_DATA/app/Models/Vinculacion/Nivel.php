<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles';
    public $timestamps = true;

    public function carreras(){
        return $this->belongsToMany(Carrera::class, 'nivel_carrera_ciclo_grupo')->wherePivot('activo', 1)->withPivot('id');
    }
    
    // //Ricardo Cauich
    
    //     public function Seguimiento_egresado()
    // {
    // 	return $this->hasmany('App\Seguimiento_egresado', 'id');
    // }
        
  
    // //Emiliano
    // public function ProfesorGrupo(){
    //     return $this->hasMany('App\ProfesorGrupo', 'id');
    // }
}
