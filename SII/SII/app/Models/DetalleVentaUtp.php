<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVentaUtp extends Model
{
    protected $table = 'alumnopagosdet';
    protected $primaryKey = 'idAlumnoPagosDet';

    public $timestamps = false;

    protected $fillable = [
    'fecha',
    'reciboCaja',
    'precio',
    'idConcepto', 
    'idAlumnoCxC', 
    'idAlumno',
    'idCiclo',
    'idPlan',
    'idCaja',
    'anio',
    'mes',
    'cantidad',
    'recibidoPor'
    ];
}
