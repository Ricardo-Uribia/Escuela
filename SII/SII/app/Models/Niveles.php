<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    protected $fillable = [
     'Identificador', 'Descripcion_Nivel', 'Acuerdo_Creacion', 'Fecha', 'Del', 'A', 'id_Ciclo'  
    ];

    protected $table = 'niveles';
    public $timestamps = false;

    public  function planesEst(){
    	return $this->belongsTo('App\Models\PlanesEst', 'Carrera_Aplica_id');
    }
    
    //Ricardo Cauich
    
        public function Seguimiento_egresado()
    {
    	return $this->hasmany('App\Seguimiento_egresado', 'id');
    }
    
    //angel
    public function Grupos(){
    	return $this->hasMany('App\Models\Grupos','id');
    }
    
    //Emiliano
    public function ProfesorGrupo(){
        return $this->hasMany('App\ProfesorGrupo', 'id');
    }
}
