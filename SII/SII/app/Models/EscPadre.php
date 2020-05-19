<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscPadre extends Model
{
     protected $fillable = [
        'escolaridadPadre', 'descripcion',
    ];

     protected $table = 'cat_esc_padre';
    public $timestamps = false;
}
