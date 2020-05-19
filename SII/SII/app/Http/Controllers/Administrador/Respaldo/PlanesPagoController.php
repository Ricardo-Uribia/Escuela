<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PlanesPago;
use App\Models\Ciclo;
use App\PlanPagoMST;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PlanesPagoFormRequest;
use DateTime;

class PlanesPagoController extends Controller
{
    public function __construct()
    {
    	  
    }


    //Funciones Para insertar en el modelo de planes_MST
     public function getPLanMST(Request $request){
        //index de planesMST
        if ($request) 
        {
            $query=trim($request->get('searchText'));


        $plan = DB::table('planes_pagomst as ppm')
            ->join('ciclo as c' , 'c.idCiclo','=', 'ppm.idCiclo')
            ->select('ppm.idPlanesPagoMST', 'ppm.codigoPlan','ppm.idCiclo' ,'ppm.descripcion', 'c.inicial', 'c.final', 'c.periodo')
            ->where('ppm.codigoPlan', 'LIKE', '%'. $query . '%')
            ->orwhere('ppm.descripcion', 'LIKE', '%'. $query . '%')
            ->orderBy('ppm.idPlanesPagoMST', 'desc')
            ->paginate(7);

            return view('admin.cobranza.planes.planesMST.index', ["plan" => $plan, "searchText" => $query]);
        }
    }


     public function store(PlanesPagoFormRequest $request){

            $plan = new PlanPagoMST;
            $plan->codigoPlan=$request->get('codigoPlan');
            $plan->descripcion=$request->get('descripcion');
            $plan->idCiclo=$request->get('idCiclo');
            $plan->save();
        

        return Redirect::to('configurar/planes');

    }

   
     public function edit($id, $ciclo){

        $plan = PlanPagoMST::findOrFail($id);
        $planCicloID=$plan->idCiclo;

        $ciclo= DB::table('ciclo as c')
        ->select(DB::raw('CONCAT("Inicial: " , c.inicial, " " , "Final: " , " " ,c.final, " ","Periodo: ", " " ,c.periodo) as ciclo'), 'c.idCiclo')
        ->where('idCiclo', $planCicloID)->get();

         $concepto=DB::table('conceptopago')
        ->select('idConceptosPagos', 'descripcion', 'codigoConcepto')
        ->where('codigoConcepto', '=', 'INSCRIP')
        ->orwhere('codigoConcepto', '=', 'REINSC')
        ->get();

       
        return view("admin.cobranza.planes.edit", ["planes" => PlanPagoMST::findOrFail($id), "ciclo" => $ciclo, 'concepto' => $concepto]);
    }






    //Funciones para insertar en el modelo de planes de pago



    public function update(PlanesPagoFormRequest $request, $id){


        $plan = new PlanesPago;
        $plan->anioCorresponde=$request->get('anioCorresponde');
        $plan->idCiclo=$request->get('idCiclo');
         $plan->idConceptoPago=$request->get('idConceptosPagos');
        $plan->mes=$request->get('mes');
        $plan->fechaInicio=$request->get('fechaInicio');
        $plan->fechaFin=$request->get('fechaInicio');
        $plan->precio=$request->get('cantidad');
        $plan->idPlanesPagoMST=$id;

        $plan->save();
        return Redirect::to('utp/planesPago');
    }






    public function index(Request $request){

    	if ($request) 
    	{
    		$query=trim($request->get('searchText'));

             $ciclo= DB::table('ciclo')
            ->select(DB::raw('CONCAT("Inicial: " , inicial, " " , "Final: " , final, "Periodo: ", periodo) as ciclo'), 'idCiclo','descripcion')
            ->orderBy('idCiclo', 'desc')
            ->get();

    		$plan = DB::table('planespago as pp')
    		->join('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
            ->join('planes_pagomst as ppms', 'pp.idPlanesPagoMST', '=', 'ppms.idPlanesPagoMST')
    		->select('pp.idPlanesPago', 'ppms.codigoPlan', 'ppms.descripcion', 'pp.fechaInicio', 'pp.fechaFin', 'pp.precio', 'c.inicial', 'c.final', 'c.periodo', 'pp.anioCorresponde', 'pp.mes')
    		->where('ppms.codigoPlan', 'LIKE', '%'. $query . '%')
    		->orwhere('c.periodo', 'LIKE', '%'. $query . '%')
    		->orderBy('pp.idPlanesPago', 'desc')
    		->paginate(7);


    		return view('admin.cobranza.planes.index', ["plan" => $plan, "searchText" => $query, "ciclo" => $ciclo]);
    	}
    }

   
    public function show ($id){

        $plan = DB::table('planespago as pp')
            ->join('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
            ->join('planes_pagomst as ppms', 'pp.idPlanesPagoMST', '=', 'ppms.idPlanesPagoMST')
            ->join('conceptopago as cp', 'pp.idConceptoPago', '=', 'cp.idConceptosPagos')
            ->select('pp.fechaInicio','pp.fechaFin','pp.idPlanesPago', 'ppms.codigoPlan', 'ppms.descripcion', 'pp.precio', 'pp.anioCorresponde', 'pp.mes', 'c.descripcion', 'cp.descripcion as concepto', 'ppms.descripcion as descripPlan')
            ->where('pp.idPlanesPago', '=', $id)
            ->get();


            return view('admin.cobranza.planes.show', ["plan" => $plan,]);

    	
    }

   

    
    public function destroy($id){

        $plan = PlanesPago::findOrFail($id);
        $plan->delete();
        $idplanMST = $plan->idPlanesPagoMST;
        $planeMST= PlanPagoMST::findOrFail($idplanMST);
        $planeMST->delete();
       

    	return Redirect::to('utp/planesPago');

    }
}
