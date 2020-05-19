<?php

namespace App\Models\Empleados\Profesores;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    public $timestamps = true;

    protected $fillable = ['id','clave','empleado_id'];

    public function empleado(){
    	 return $this->hasOne('App\Models\Empleados\Empleado','id','empleado_id');
    }

}
