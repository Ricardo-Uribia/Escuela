<?php

namespace App\Models\Vinculacion;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $timestamps = true;

	public function TipoEvento(){
		return $this->belongsto('App\TipoEvento', 'idEvento');

	}

	public function Ciclo()
	{
		return $this->belongsto('App\Models\Ciclo', 'idCiclo');
	}

	public function Actividade()
	{
		return $this->hasmany('App\Actividade', 'idCatalogoEvento');
	}

	public function EstatusEvento()
	{
		return $this->belongsTo('App\EstatusEvento', 'idestatusEvento');
	}
}
