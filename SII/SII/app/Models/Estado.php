<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
       'NOMBRE', 'CLAVE',
    ];

     protected $table = 'estados';
    public $timestamps = false;


    public function empleados(){
        return $this->hasMany('App\Models\Empleado');
    }

    public function towns(){
        return $this->hasMany('App\Models\Town');
    }

   
}
