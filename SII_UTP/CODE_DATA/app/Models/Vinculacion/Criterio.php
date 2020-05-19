<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    
    protected $table = 'criterios';
    protected $timestamps = true;
    public function Momento(){
       return $this->belongsTo('App\Momento','idMomento');
    }

}
