<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActPadre extends Model
{
     protected $fillable = [
        'actividadPadre', 'descripcion',
    ];

     protected $table = 'cat_act_padre';
    public $timestamps = false;
}
