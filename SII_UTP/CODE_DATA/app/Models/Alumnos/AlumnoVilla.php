<?php

namespace App\Models\Alumnos;

use Illuminate\Database\Eloquent\Model;

class AlumnoVilla extends Model
{
    
    protected $table = 'alumnos_villas';
    protected $timestamps = true;
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
