<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanesPago extends Model
{
    protected $table = 'planespago';
    protected $primaryKey = 'idPlanesPago';

    public $timestamps = false;

    protected $fillable = [

    'idCiclo',
    'anioCorresponde',
    'mes',
    'fechaInicio',
    'fechaFin',
    'precio',
    'idPlanesPagoMST'
    ];

    public function planpagomst()
    {
        return $this->belongsTo('App\PlanPagoMST', 'idPlanesPagoMST', 'idPlanesPagoMST');
    }
}
