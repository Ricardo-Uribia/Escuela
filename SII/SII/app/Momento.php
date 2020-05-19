<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Momento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'momento';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idMomento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idMomento', 'momento'];

    public function criterios(){
        return $this->hasMany('App\Criterio','idMomento');
    }

    
}
