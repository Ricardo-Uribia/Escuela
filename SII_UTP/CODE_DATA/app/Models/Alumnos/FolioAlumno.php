<?php

namespace App\Models\Alumnos;

use Illuminate\Database\Eloquent\Model;

class FolioAlumno extends Model
{
    protected $table='folios_alumno';
    public $timestamps=true;
   
   public function alumno(){
        return $this->belongsTo(Alumno::class);
    }
}
