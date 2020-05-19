<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
   
    protected $table = 'tipoevento';

  
    protected $primaryKey = 'idEvento';


    protected $fillable = ['idEvento', 'TipoEvento'];

    public function CatalogoEvento()
    {
    	return $this->hasmany('App\CatalogoEvento', 'idEvento');
    }

    
}
