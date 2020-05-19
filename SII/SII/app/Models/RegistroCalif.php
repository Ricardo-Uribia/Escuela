<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCalif extends Model
{
    protected $fillable = [

    'id_Ciclo','Momento','id_Asignatura','id_Ponderacion','Valor_P1','Valor_P2','Valor_P3','Total_Sesiones_P1',
  'Total_Sesiones_P2','Total_Sesiones_P3','id_Alumno','id_Grupo','Nombres','Paterno','Materno','Matricula',
  'Asistencias_P1','Asistencias_P2','Asistencias_P3','Calificacion_P1','Calificacion_P2','Calificacion_P3',
  'Calif_Asesorias1','Asist_Asesorias1','Calif_Asesorias2','Asist_Asesorias2','Ord1','Asist_Ord1','Ord2',
  'Asist_Ord2','Ord3','Asist_Ord3','Calif_Final_Ord','Asist_Final_Ord','Calif_Recuperativo','Calif_Especial',
   
    ];

    
protected $table = 'registro_calif';
    public $timestamps = false;
}
