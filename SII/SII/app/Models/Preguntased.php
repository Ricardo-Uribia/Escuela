<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preguntased extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'e_preguntased';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idpreguntaed';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idpreguntaed', 'idplaned', 'numero', 'claveplaned','clavepregunta', 'preguntas'];
    public $timestamps = false;

    public  function planed(){
        return $this->belongsTo('App\Models\Planed', 'idplaned');
    }
}
