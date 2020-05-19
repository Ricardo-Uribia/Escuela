<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscMadre extends Model
{
    protected $fillable = [
        'escolaridadMadre', 'descripcion',
    ];

     protected $table = 'cat_esc_madre';
    public $timestamps = false;
}
