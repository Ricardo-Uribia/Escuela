<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class SeguimientoEgresados extends Model
{
    
    protected $table = 'seguimiento_egresados';
    public $timestamps = true;

    public function Ciclo()
    {
        return $this->belongsTo('App\Models\Ciclo', 'idCiclo');
    }

    public function Niveles()
    {
        return $this->belongsTo('App\Models\Niveles', 'id');
    }
}
