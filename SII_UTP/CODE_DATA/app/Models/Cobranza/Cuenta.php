<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';
    public $timestamps = true;

    public function caja()
    {
    	 return $this->hasOne('App\Models\Caja', 'cuenta_id', 'id');
    }

    public function ConceptoPago()
    {
         return $this->hasOne('App\Models\ConceptoPago', 'idCuenta', 'idConceptosPagos');
    }
}
