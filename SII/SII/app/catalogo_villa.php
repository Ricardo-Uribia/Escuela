<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalogo_villa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'catalogo_villas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idcatalogo_villas'; 

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idcatalogo_villas', 'idCiclo', 'idgrupos_villas', 'genero', 'cupoMaximo', 'responsableVilla'];

    public function grupos_villa()
    {
        return $this->belongsTo('App\grupos_villa', 'idgrupos_villas');
    }

    public function Ciclo()
    {
        return $this->belongsTo('App\Models\Ciclo', 'idCiclo');
    }

    public function alumnos_villa()
    {
        $this->belongsTo('App\alumnos_villa', 'idcatalogo_villas');
    }
}
