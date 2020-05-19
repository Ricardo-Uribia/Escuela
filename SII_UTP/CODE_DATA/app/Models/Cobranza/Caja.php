<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'cajas';
    public $timestamps = true;

    public function empleado()
    {
    	return $this->belongsTo('App\Models\Empleados\Empleado');
    }

    public function cuenta()
    {
    	return $this->belongsTo(Cuenta::class);
    }

    public function productos(){
         return $this->belongsToMany(Producto::class, 'alumnopagosdet')->withPivot('anio','mes', 'reciboCaja', 'fechaPago', 'recibidoPor');
    }

    public function alumnocxc(){
         return $this->belongsToMany(Alumnocxc::class, 'alumnopagosdet')->withPivot('anio','mes', 'reciboCaja', 'fechaPago', 'recibidoPor');
    }
}
