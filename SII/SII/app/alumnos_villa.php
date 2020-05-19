<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumnos_villa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alumnos_villas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idalumnos_villas';

    /**
     * Attributes that should be mass-assignable. 
     *
     * @var array
     */ 
    protected $fillable = ['idcatalogo_villas','idalumnos_villas', 'idCiclo',
    'idalumno', 'idgrupo', 'fecha_ingreso', 'costo_viaje', 'tiempo_viaje', 'observaciones_villa'];

    public function AlumnosGrupos()
    {
        return $this->belongsTo('App\Models\AlumnosGrupo', 'id_ciclo');
    }

    public function Grupo_villas()
    {
        return $this->belongsTo('App\Grupo_villas', 'idgrupo_villas');
    }

    public function AlumnosGrupo()
    {
        return $this->belongsTo('App\Models\AlumnosGrupos', 'id_alumnos');
    }

    public function Grupos()
    {
        return $this->belongsTo('App\Models\Grupos', 'id');
    }

    public function catalogo_villa()
    {
        return $this->hasmany('App\catalogo_villa', 'idcatalogo_villas');
    }
}
