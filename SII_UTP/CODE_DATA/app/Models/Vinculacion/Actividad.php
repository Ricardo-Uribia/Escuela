<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    
    protected $table = 'extracurriculares';

    public function CatalogoEvento()
    {
        return $this ->belongsTo('App\CatalogoEvento', 'idCatalogoEvento');
    }
    
}
