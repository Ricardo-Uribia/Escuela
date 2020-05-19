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
     public function getPLanMST(Request $request){ //filtra por ciclos 
        //index de planesMST
        
        if (\Session::get('ciclos')) {

        $plan = DB::table('planes_pagomst as ppm')
            ->leftjoin('ciclo as c' , 'c.idCiclo','=', 'ppm.idCiclo')
            ->select('ppm.idPlanesPagoMST', 'ppm.codigoPlan','ppm.idCiclo' ,'ppm.descripcion', 'c.descripcion as ciclo')
            
            ->where('c.idCiclo', '=', $this->getCiclo())
            ->get();

            return view('admin.cobranza.planes.planesMST.index', ["plan" => $plan]);
        }else{
             return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../configurar/planes';}</script>";
        }
    }


     public function store(PlanesPagoFormRequest $request){

        if (\Session::get('ciclos')) {
              
            $plan = new PlanPagoMST;
            $plan->codigoPlan=$request->get('codigoPlan');
            $plan->descripcion=$request->get('descripcion');
            $plan->idCiclo= \Session::get('ciclos')->idCiclo;
            $plan->save();

        return Redirect::to('configurar/planes');

        }else{
             return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../utp/planesPago';}</script>";
        }
    }

   
     public function edit($id, $ciclo){

       
            
        $plan = PlanPagoMST::findOrFail($id);
        $planCicloID=$plan->idCiclo;

        $ciclo= DB::table('ciclo as c')
        ->select(DB::raw('descripcion as ciclo'), 'c.idCiclo')
        ->where('idCiclo', $planCicloID)->get();


         $concepto=DB::table('conceptopago')
        ->select('idConceptosPagos', 'descripcion', 'codigoConcepto', 'precio')
        ->where('codigoConcepto', '=', 'INSCRIP')
        ->orwhere('codigoConcepto', '=', 'REINSC')
        ->get();

       
        return view("admin.cobranza.planes.edit", ["planes" => PlanPagoMST::findOrFail($id), "ciclo" => $ciclo, 'concepto' => $concepto]);
    }
        //f
    public function Editando($id, $ciclo){

        $plan = PlanesPago::findOrFail($id);
        $planCicloID=$plan->idCiclo;

        $ciclo= DB::table('ciclo as c')
        ->select(DB::raw('descripcion as ciclo'), 'c.idCiclo')
        ->where('idCiclo', $planCicloID)->get();


         $concepto=DB::table('conceptopago')
        ->select('idConceptosPagos', 'descripcion', 'codigoConcepto', 'precio')
        ->where('codigoConcepto', '=', 'INSCRIP')
        ->orwhere('codigoConcepto', '=', 'REINSC')
        ->get();

        return view("admin.cobranza.planes.editarShow", ["planes" => PlanesPago::findOrFail($id), "ciclo" => $ciclo, 'concepto' => $concepto]);
    }


     public function destroyPlanMST($id){

        $plan = PlanPagoMST::findOrFail($id);
        $plan->delete();
    
        return Redirect::to('configurar/planes');

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

     public function Actualizar(PlanesPagoFormRequest $request, $id){

        $plan = new PlanesPago;
        $plan->anioCorresponde=$request->get('anioCorresponde');
        $plan->idCiclo=$request->get('idCiclo');
         $plan->idConceptoPago=$request->get('idConceptosPagos');
        $plan->mes=$request->get('mes');
        $plan->fechaInicio=$request->get('fechaInicio');
        $plan->fechaFin=$request->get('fechaInicio');
        $plan->precio=$request->get('cantidad');
        $plan->idPlanesPago=$id;

        $plan->save();
        return Redirect::to('utp/planesPago');
    }


  /*   public function index1(Request $request){

          
                 if (\Session::get('ciclos')) {

                   
      

                    $idCiclos = \Session::get('ciclos')->idCiclo;
         
                  
                    $plan = DB::table('planespago as pp')
                    ->join('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
                    ->join('planes_pagomst as ppms', 'pp.idPlanesPagoMST', '=', 'ppms.idPlanesPagoMST')
                    ->select('pp.idPlanesPago', 'ppms.codigoPlan', 'ppms.descripcion', 'pp.fechaInicio', 'pp.fechaFin', 'pp.precio', 'c.descripcion as ciclo', 'pp.anioCorresponde', 'pp.mes')
                    ->where('c.idCiclo', '=', $idCiclos)
                    ->orderBy('pp.idPlanesPago', 'desc')
                    ->get();

                   

                     return json_encode($plan);
                    
                    
                }else{

                    return json_encode($plan);
                }
            
        
    }
*/


    public function index(Request $request){

            if ($request) 
            {
                    $query=trim($request->get('searchText'));
                    $plan = DB::table('planespago as pp')
                    ->join('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
                    ->join('planes_pagomst as ppms', 'pp.idPlanesPagoMST', '=', 'ppms.idPlanesPagoMST')
                    ->select('pp.idPlanesPago', 'ppms.codigoPlan', 'ppms.descripcion', 'pp.fechaInicio', 'pp.fechaFin', 'pp.precio', 'c.descripcion as ciclo', 'pp.anioCorresponde', 'pp.mes')
                    ->where('ppms.codigoPlan', 'LIKE', '%'. $query . '%')
                    ->orwhere('c.periodo', 'LIKE', '%'. $query . '%')
                    ->orderBy('pp.idPlanesPago', 'desc')
                    ->paginate(7);

                  
                    return view('admin.cobranza.planes.index', ["plan" => $plan, "searchText" => $query]);
                
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
       

    	return Redirect::to('/utp/planesPago');

    }
}
