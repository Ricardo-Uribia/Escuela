<?php

namespace App\Http\Controllers;
use App\Models\Niveles;
use App\Models\Ciclo;
use App\Models\PlanesEst;
use App\Models\Grupos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CarrerasController extends Controller
{
      public function config()
    {

       $nivel = Niveles::all();
       return view('configuracion.general', ['nivel' => $nivel]);
       

    }

        public function crearNivel()
    {

       return view('partials.alumnos.archivos.crearNivel');
    }

   	   public function store(Request $request)
   {
       
       if(\Session::get('ciclos')){


    $nuevoNivel = new Niveles();
    $nuevoNivel->id_Ciclo=\Session::get('ciclos')->idCiclo;
    $nuevoNivel->Identificador=$request->identificador;
    $nuevoNivel->Descripcion_Nivel=$request->descriptNivel;
    $nuevoNivel->Acuerdo_Creacion=$request->acuerdoCreacion;
    $nuevoNivel->Fecha=$request->fechaNivel;
    $nuevoNivel->Del=$request->del;
    $nuevoNivel->A=$request->a;
  

      $nuevoNivel->save();
    return Redirect::to('/configuracion');
    
       }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../crear/nivel';}</script>";
    }
    
	}

	 public function update(Request $request, $id)
    {
        $niv = Niveles::FindOrFail($id);


    $niv->Identificador=$request->identificador;
    $niv->Descripcion_Nivel=$request->descriptNivel;
    $niv->Acuerdo_Creacion=$request->acuerdoCreacion;
    $niv->Fecha=$request->fechaNivel;
    $niv->Del=$request->del;
    $niv->A=$request->a;
  

      $niv->save();
       
        return Redirect::to('/configuracion');
    }

     public function edit($id)
    {
      $niv = Niveles::FindOrFail($id);
       return view('partials.alumnos.archivos.editNivel', ['niv' => $niv]);
    
    }

      public function destroy($id)
    {
        try{
            $niv = Niveles::findOrFail($id);
            $niv->delete();
            return Redirect::to('/configuracion');
        } catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
    
    
    public function getPlanes(Request $request, $id){
      if($request->ajax()){
          $planes = PlanesEst::planes($id);
          return response()->json($planes);
    }

    } 

    public function getGrupos(Request $request, $id){
      if($request->ajax()){
          $grupos = Grupos::grupos($id);
        //   ->Where('idCiclo',  '=', $this->getCiclo());
          return response()->json($grupos);
    }

    } 
    
}
