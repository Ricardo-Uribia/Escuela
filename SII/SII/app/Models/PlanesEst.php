<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanesEst extends Model
{	 
	protected $table = 'plan_est';
	protected $primaryKey = 'idPlanEst';
    protected $fillable = ['idPlanEst','idNivel','clave_plan','nombre_plan','oficio_auto','calif_min','calif_max','min_aprobatoria','calc_promedio'];
    public $timestamps = false;

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
