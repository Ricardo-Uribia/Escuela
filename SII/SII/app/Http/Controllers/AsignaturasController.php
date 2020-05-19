<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;
use App\Models\PlanesEst;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AsignaturasController extends Controller
{
 
  public function index($id)
  {
    $plan = planesEst::FindOrFail($id);
    $listaAsignatura = Asignatura::where('idPlanEst', '=', $plan->idPlanEst)->get();
    return view ('asignaturas.index', ['plan' => $plan, 'listaAsignatura' => $listaAsignatura]) ;
  }

  public function create($id)
  {
    $plan = planesEst::FindOrFail($id);
  	return view('asignaturas.create', ['plan' => $plan]);
  }

  public function store(Request $request, $id)
  {
    $asignatura = new Asignatura();
    $asignatura->clave_asignatura=$request->claveAsig;
    $asignatura->nombre_asignatura=$request->nombreAsig;
    $asignatura->nombre_corto=$request->nombreCorto;
    $asignatura->descripcion=$request->descrip;
    $asignatura->cuatrimestre=$request->cuatri;
    $asignatura->horas_teoricas=$request->hteoria;
    $asignatura->horas_practicas=$request->hpractica;
    $asignatura->area_conocimiento=$request->area;
    $asignatura->tipo_asignatura=$request->tipoAsig;
    $asignatura->contar_promedio=$request->contaProm;
    $asignatura->idPlanEst=$id;
    $asignatura->save();

    return Redirect::to('asignaturas/'.$id)->with('status','Asignatura Creada Correctamente');
    
  }

  public function edit($id)
  {
    $asignatura = Asignatura::FindOrFail($id);
     return view('asignaturas.edit', ['asignatura' => $asignatura]);
  
  }

  public function update(Request $request, $id)
  {
    $asignatura = Asignatura::FindOrFail($id);
    $asignatura->clave_asignatura=$request->claveAsig;
    $asignatura->nombre_asignatura=$request->nombreAsig;
    $asignatura->nombre_corto=$request->nombreCorto;
    $asignatura->descripcion=$request->descrip;
    $asignatura->cuatrimestre=$request->cuatri;
    $asignatura->horas_teoricas=$request->hteoria;
    $asignatura->horas_practicas=$request->hpractica;
    $asignatura->area_conocimiento=$request->area;
    $asignatura->tipo_asignatura=$request->tipoAsig;
    $asignatura->contar_promedio=$request->contaProm;
    $asignatura->save();
       
    return Redirect::to('asignaturas/'.$asignatura->idPlanEst)->with('status','Asignatura Actualizada Correctamente');
  }

  public function destroy($id)
  {
    $materia = Asignatura::find($id)->delete();
    return back()->with('status', 'Asignatura Eliminada Correctamente');
  }

}
