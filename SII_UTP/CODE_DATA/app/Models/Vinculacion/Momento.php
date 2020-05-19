<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Momento extends Model
{
    protected $table = 'momentos';
     protected $timestamps = true;

    public function criterios(){
        return $this->hasMany('App\Criterio','idMomento');
    }

}
