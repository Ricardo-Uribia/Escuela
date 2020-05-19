<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planed extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'e_planed';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idplaned';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idplaned', 'claveplaned', 'nombre','created_at'];
     public $timestamps = false;

     public function preguntased(){
        return $this->hasMany('App\Models\Preguntased', 'idplaned');
    }
    public function EvaluacionDocente(){
        return $this->beloingsTo('App\Models\EvaluacionDocente', 'id');
    }
    
}
