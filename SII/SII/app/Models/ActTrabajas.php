<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActTrabajas extends Model
{
    protected $fillable = [
        'actividadTrabajas', 'descripcion',
    ];

     protected $table = 'cat_act_trabajas';
    public $timestamps = false;
}
