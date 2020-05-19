<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    
    protected $table = 'e_preguntas';
    public $timestamps = true;

    public  function planed(){
        return $this->belongsTo('App\Models\Planed', 'idplaned');
    }
}
