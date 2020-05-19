<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActConyuge extends Model
{
    protected $fillable = [
        'actividadConyuge', 'descripcion',
    ];

    protected $table = 'cat_act_conyugue';
    public $timestamps = false;
}
