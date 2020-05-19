<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanesEst;
use App\Models\Niveles;
use App\Models\Ciclo;
use App\Models\Asignatura;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PlanesEstController extends Controller
{
     public function index(Request $request)
    {
      $idNivel = $request->get('carrera');

      if(!empty($idNivel)){

      $plan = PlanesEst::where('idNivel', '=', $idNivel)->get();
      return view('planes.index', ['plan' => $plan, 'idNivel' => $idNivel]);

      }else{

        $plan = PlanesEst::all();
        return view('planes.index', ['plan' => $plan]);

      }

      
    }

  public function create()
  {
    $nivel = Niveles::all();
   	return view('planes.create', ['nivel' => $nivel]);
   }

       

   public function store(Request $request)
   {
    $nuevoPlan = new PlanesEst();
    $nuevoPlan->clave_plan=$request->clavePlan;
    $nuevoPlan->nombre_plan=$request->nombrePlan;
    $nuevoPlan->idNivel=$request->nivel;
    $nuevoPlan->oficio_auto=$request->oficioAuto;
    $nuevoPlan->calif_min=$request->califMin;
    $nuevoPlan->calif_max=$request->califMax;
    $nuevoPlan->min_aprobatoria=$request->aprobatoria;
    $nuevoPlan->calc_promedio=$request->calcPromedio;
    $nuevoPlan->save();

   return Redirect::to('/planes')->with('status','Plan Creado Correctamente');   
}

      public function update(Request $request, $id)
    {
        
    $plan = planesEst::FindOrFail($id);
    $plan->clave_plan=$request->clavePlan;
    $plan->nombre_plan=$request->nombrePlan;
    $plan->idNivel=$request->nivel;
    $plan->oficio_auto=$request->oficioAuto;
    $plan->calif_min=$request->califMin;
    $plan->calif_max=$request->califMax;
    $plan->min_aprobatoria=$request->aprobatoria;
    $plan->calc_promedio=$request->calcPromedio;
    $plan->save();
       
    return Redirect::to('planes')->with('status','Plan Actualizado Correctamente');
    }

   public function edit($id)
    {
      $nuevoPlan = PlanesEst::FindOrFail($id);
      $nivel = Niveles::all();
       return view('planes.edit',compact('nuevoPlan','nivel'));
    
    }

       public function destroy($id)
    {
        try{
            $nuevoPlan = PlanesEst::findOrFail($id);
            $nuevoPlan->delete();
            return Redirect::to('planes')->with('status', 'Plan Eliminado Correctamente');
        } catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
        
    }

    public function getAsignaturas(Request $request, $id){
      if($request->ajax()){
          $asignaturas = Asignatura::asignaturas($id);
          return response()->json($asignaturas);
    }

    }     

}
