<?php

namespace App\Models\Configuracion;

use Illuminate\Database\Eloquent\Model;

class TokenFicha extends Model
{
    protected $table = '_token_fichas';
    public $timestamps = true;

    protected $fillable = ['curp_alumno', '_token', 'fecha_expira'];
}
