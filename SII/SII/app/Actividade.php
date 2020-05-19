<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividade extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actividades';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idactividades';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idCatalogoEvento','idactividades', 'idCiclo', 'idEvento', 'id_alumno', 'id_grupo', 'descripcion'];


    public function CatalogoEvento()
    {
        return $this ->belongsTo('App\CatalogoEvento', 'idCatalogoEvento');
    }
    
}
