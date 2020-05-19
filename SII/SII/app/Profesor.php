<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profesores';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id','ClaveProfesor','idEmpleado'];

    public function ProfesorGrupo(){
        return $this->hasMany('App\ProfesorGrupo','idEmpleado','id');
    }

    public function Empleados(){
       return $this->belongsTo('App\Models\Empleado','idEmpleado','id');
    }


}
