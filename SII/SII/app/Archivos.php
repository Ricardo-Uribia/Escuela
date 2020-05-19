<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    protected $fillable = [
		 'nombre', 'descripcion', 'recibido', 'copia', 'validado', 'fecha_recepcion', 'fecha_prestamo',
		 'devolucion', 'fecha_devolucion', 'observaciones',
   
    ];

    protected $table = 'documentos';
    public $timestamps = false;
}
