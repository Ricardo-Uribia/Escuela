<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoEvento extends Model
{
     
    protected $table = 'catalogoevento';

     protected $primaryKey = 'idCatalogoEvento';

 
    protected $fillable = ['idCatalogoEvento', 'idCiclo', 'idEvento', 'descripcion', 'categoria', 'fechaInicio', 'fechaFinal', 'horaInicio', 'horaTermino', 'idestatusEvento', 'cupoMaximo', 'cupoMinimo', 'titular', 'sede'];

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
