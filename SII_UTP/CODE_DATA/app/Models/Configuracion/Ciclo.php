<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Ciclo extends Model
{
    protected $table = 'ciclos';
    public $timestamps = true;

    public function Seguimiento_egresado()
    {
        return $this->hasmany('App\Seguimiento_egresado', 'id');
    } 
}
