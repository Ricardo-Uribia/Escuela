<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumnosegresado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alumnosegresados';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idalumnosegresados';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idalumnosegresados', 'nombre', 'carrera', 'matricula', 'grupo', 'estatus', 'numero', 'estado', 'municipio', 'lugar', 'edad', 'direccion'];

    
}