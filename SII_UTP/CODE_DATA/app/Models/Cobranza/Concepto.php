<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concepto extends Model
{	
	use SoftDeletes;
	
    protected $table = 'conceptopagos';
    public $timestamps = true;

    public function producto(){
        return $this->belongsTo(Producto::class,'id','tipo_id');
    }

    public function planespago(){
        return $this->belongsTo(PlanesPago::class);
    }
}
