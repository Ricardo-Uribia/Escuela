<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConceptoPago extends Model
{
    protected $table = 'conceptopago';
    protected $primaryKey = 'idConceptosPagos';

    public $timestamps = false;

    protected $fillable = [ 
    'impuesto',
    'codigoConcepto', 
    'descripcion',
    'precio',
    'idCuenta',
    ];

  

    public function cuenta(){

        return $this->belongsTo('App\Models\Cuenta', 'idCuenta', 'idCatCuentas');
    }
}
