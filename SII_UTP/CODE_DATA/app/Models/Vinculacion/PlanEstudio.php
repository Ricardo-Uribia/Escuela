<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    protected $table = 'planestudio';
    public $timestamps = true;

    public function ProfesorGrupo(){
    	return $this->hasMany('App\ProfesorGrupo','idPlanEst');
    }

    public function nivel(){
        return $this->belongsTo('App\Models\Niveles', 'idNivel');
    } 
    
    public static function planes($id){
        return PlanesEst::where('idNivel', '=', $id)->get();
    }
}
