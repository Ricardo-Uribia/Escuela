<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusEvento extends Model
{
   
    protected $table = 'estatusevento';

  
    protected $primaryKey = 'idestatusEvento';


    protected $fillable = ['idestatusEvento', 'estatus'];

    public function CatalogoEvento()
    {
    	return $this->hasmany('App\CatalogoEvento', 'idestatusEvento');
    }

    
}
