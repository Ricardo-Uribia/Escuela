<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupos_villa extends Model
{

	protected $table ='grupos_villas';

	protected $primaryKey='idgrupos_villas';

	protected $fillable = ['idgrupos_villas', 'nombreVilla'];

	public function alumnos_villas()
	{
		return $this->hasmany('App\alumnos_villas');
	}

	public function catalogo_villa()
	{
		return $this->hasmany('App\catalogo_villa', 'idgrupos_villas');
	}
}