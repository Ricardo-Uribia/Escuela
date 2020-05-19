<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscConyuge extends Model
{
    protected $fillable = [
        'escolaridadConyuge', 'descripcion',
    ];

     protected $table = 'cat_esc_conyuge';
    public $timestamps = false;
}
