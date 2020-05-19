<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'criterio';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idCriterio';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idCriterio','idMomento', 'clave_crit', 'criterio','created_at'];

    public function Momento(){
       return $this->belongsTo('App\Momento','idMomento');
    }

}


