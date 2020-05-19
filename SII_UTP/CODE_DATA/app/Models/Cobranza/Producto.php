<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

    protected $table = 'producto';
    public $timestamps = true;

    public function conceptopago()
    {
    	return $this->hasOne(Concepto::class, 'id', 'tipo_id');
    }

    public function planespago()
    {
    	return $this->hasOne(Planpago::class, 'id', 'tipo_id');
    }
    
    public function alumnocxcs()
    {
        return $this->belongsToMany(Alumnocxc::class, 'alumnopagosdet', 'id', 'alumnocxc_id');
    }
    
    public function cajas(){
         return $this->belongsToMany(Caja::class, 'alumnopagosdet')->withPivot('anio','mes', 'reciboCaja', 'fechaPago', 'recibidoPor');
    }
}
