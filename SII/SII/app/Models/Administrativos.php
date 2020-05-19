<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativos extends Model
{
     protected $fillable = [

 			'Telefono_Oficina','Emergencia_Persona','Emergencia_Telefono','Trabajo_Anterior','Cargo_Anterior',
        	'Username', 'Fecha_Actualizacion','Username_Actualizado', 'idEmpleado'
     ];


    protected $table = 'administrativos';
    public $timestamps = false;

     public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado');
    }
 }