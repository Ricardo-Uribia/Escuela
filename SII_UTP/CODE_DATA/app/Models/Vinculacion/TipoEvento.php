<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'tipoevento';
    public $timestamps = true;

    public function CatalogoEvento()
    {
    	return $this->hasmany('App\CatalogoEvento', 'idEvento');
    }

}
