<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';
    public    $timestamps = true;

    protected $fillable = ['descripcion','status','nivel_id'];

    public function nivel(){
        return $this->hasOne('App\Models\Vinculacion\Nivel','id','nivel_id');
    }
   
}


