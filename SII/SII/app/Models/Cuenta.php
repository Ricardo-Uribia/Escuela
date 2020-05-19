<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'catcuentas';
    protected $primaryKey = 'idCatCuentas';

    public $timestamps = false;

    protected $fillable = [
    'codigoCuenta', 
    'descripcion', 
    'nivel',
    ];

    public function caja()
    {
    	 return $this->hasOne('App\Models\Caja', 'cuenta_id', 'id');
    }

    public function ConceptoPago()
    {
         return $this->hasOne('App\Models\ConceptoPago', 'idCuenta', 'idConceptosPagos');
    }
}
