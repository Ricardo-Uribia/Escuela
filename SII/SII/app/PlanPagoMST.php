<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanPagoMST extends Model
{
    protected $table = 'planes_pagomst';
    protected $primaryKey = 'idPlanesPagoMST';

    public $timestamps = false;

    protected $fillable = [
    'codigoPlan', 
    'descripcion', 
    'idCiclo'
    ];

    public function planespago()
    {
    	return $this->hasOne('App\Models\PlanesPago', 'idPlanesPagoMST', 'idPlanesPago');
    }
}
