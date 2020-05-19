<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'caja';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
    'empleado_id', 
    'status', 
    'descripcion',
    'consecutivo',
    'cuenta_id'
    ];

    public function empleado()
    {
    	return $this->belongsTo('App\Models\Empleado');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Models\Cuenta', 'cuenta_id' ,'idCatCuentas');
    }


       
}
