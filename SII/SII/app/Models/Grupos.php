<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    protected $table = 'grupos';
    protected $primaryKey = 'id';
    protected $fillable = ['id_Ciclo','Codigo_Grupo','Tipo_Grupo','Cupo_Maximo', 'Turno', 'id_Carrera','Cuatrimestre', 'Diferenciador_Grupo','id_Profesor'];
    public $timestamps = false;
    
    public function AlumnosGrupos(){
		return $this->belongsTo('App\Models\AlumnosGrupos', 'id');
	}

    public function Niveles(){
      return $this->belongsTo('App\Models\Niveles','id_Carrera');
    }
    
    public static function grupos($id){
        $grupos = Grupos::where('id_Carrera', '=', $id)->get();
        return $grupos;
    }

}
