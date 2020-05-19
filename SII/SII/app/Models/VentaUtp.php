<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class VentaUtp extends Model
{
    protected $table = 'alumnocxc';
    protected $primaryKey = 'idAlumnosCxC';

    public $timestamps = false;

    protected $fillable = [
    'idAlumno', 
    'idCiclo', 
    'idPlan',
    'clave',
    'anio',
    'mes',
    'pagado',
    'cantidaProgramada',
    'cantidadPagada'
    ];



     public function scopeBusqueda($query,$dato="")
     {

            
            $resultado=  DB::table('alumnocxc as acxc')
            ->join('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'ppm.idPlanesPagoMST' , 'a.id','cc.idConceptosPagos', 'c.idCiclo', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.precio as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('ppm.codigoPlan', 'like', '%'. $dato. '%')
            ->orWhere('a.Nombres', 'like', '%'. $dato. '%')
            ->orWhere('acxc.pagado', 'like', '%'. $dato. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->get();
            
                          
        
        return  $resultado;
     }

     public function scopeBusquedaAlumno($query,$id)
     {

            
            $resultado=  DB::table('alumnocxc as acxc')
            ->join('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'ppm.idPlanesPagoMST' , 'a.id','cc.idConceptosPagos', 'c.idCiclo', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.precio as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('a.id', '==', $id)
            ->get();
            
                          
        
        return  $resultado;
     }



    
}
