<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planpago extends Model
{

    use SoftDeletes;

    protected $table = 'planespago';
    public $timestamps = true;

    public function producto()
    {	
        return $this->belongsTo(Producto::class, 'id','tipo_id');
    }

    public function concepto()
    {
        return $this->hasOne(Concepto::class, 'id', 'conceptopago_id');
    }

    public function ciclos()
    {
        return $this->hasOne('App\Models\Configuracion\Ciclo','id', 'ciclo_id');
    }

}

