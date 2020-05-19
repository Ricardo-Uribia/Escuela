<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
   protected $table = 'ciclo';
    protected $primaryKey = 'idCiclo';

    public $timestamps = false;

    protected $fillable = [
    'inicial', 
    'final', 
    'periodo',
    'descripcion',
    'codigoCorto',
    'fechaInicial',
    'fechaFinal',
    ];
    
    //Ricardo Cauich
    

    public function Seguimiento_egresado()
    {
        return $this->hasmany('App\Seguimiento_egresado', 'idCiclo');
    }
    
    public function Evaluaciondocente(){
        return $this->hasMany('App\Models\EvaluacionDocente', 'id');
    }
}
