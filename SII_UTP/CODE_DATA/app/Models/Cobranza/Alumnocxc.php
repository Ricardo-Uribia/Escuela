<?php

namespace App\Models\Cobranza;

use Illuminate\Database\Eloquent\Model;

class Alumnocxc extends Model
{
    protected $table = 'alumnocxc';
    protected $guarded = [];
    public $timestamps = true;


 /*    public function scopeBusqueda($query,$dato="")
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
     }*/

    public function productos(){
        return $this->belongsToMany(Producto::class, 'alumnopagosdet')->withPivot('anio','mes', 'reciboCaja', 'fechaPago', 'recibidoPor');
    }

    public function cajas(){
         return $this->belongsToMany(Caja::class, 'alumnopagosdet')->withPivot('anio','mes', 'reciboCaja', 'fechaPago', 'recibidoPor');
    }

    public function alumno(){
        return $this->belongsTo('App\Models\Alumnos\Alumno');
    }

    public function ciclo(){
        return $this->belongsTo('App\Models\Configuracion\Ciclo');
    }

    
}
