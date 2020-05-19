<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
  
    protected $table = 'administrativos';
    public $timestamps = true;

    //  public function empleado()
    // {
    //     return $this->belongsTo('App\Models\Empleado');
    // }
 }