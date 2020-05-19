<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $table = 'roles';
    public $timestamps = false;


    // public function empleados(){
    //     return $this->hasMany('App\Models\Empleado');
    // }

    // public function towns(){
    //     return $this->hasMany('App\Models\Town');
    // }

   
}
