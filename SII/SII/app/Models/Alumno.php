<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
	public $timestamps = false;


   public function empresas()
    {
    	return $this->belongsToMany(Empresa::class)->withPivot('id', 'fechaIncio','fechaConclusion','tipoSupervisor','supervisorNombre','fechaReconocimiento');

    	//laravel tomo como referencia que la tabla intermedia o pivot. En la bd buscara una tabla con la union de ambas tablas esta nombre debe estar en orden alfabetico y separadas por un _ y en minuscula para el caso de que sea otra tabla se hace

    	/*$this->belongsToMany(Empresa::class, 'nombre_tabla', 'id del modelo que hace la ralacion 1' , 'idDel otro modelo que hace la relacion')*/
    }

    public static function alumno($id)
    {
        return Alumno::where('id', $id)->get();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeBusqueda($query,$id)
     {

            
            $resultado=  DB::table('alumnocxc as acxc')
            ->join('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'ppm.idPlanesPagoMST' , 'a.id','cc.idConceptosPagos', 'c.idCiclo', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.precio as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('a.id', '=', $id)
            ->get();
            
                          
        
        return  $resultado;
     }
}
