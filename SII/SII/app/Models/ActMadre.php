<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActMadre extends Model
{
    protected $fillable = [
        'actividadMadre', 'descripcion',
    ];

    protected $table = 'cat_act_madre';
    public $timestamps = false;

    
}
