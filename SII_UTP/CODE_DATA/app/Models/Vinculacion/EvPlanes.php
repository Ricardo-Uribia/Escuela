<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class EvPlanes extends Model
{
    
    protected $table = 'e_planes';
    public $timestamps = true;

    public function preguntased(){
        return $this->hasMany('App\Models\Preguntased', 'idplaned');
    }
    public function EvaluacionDocente(){
        return $this->beloingsTo('App\Models\EvaluacionDocente', 'id');
    }
}
