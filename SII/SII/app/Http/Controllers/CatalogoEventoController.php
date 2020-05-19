<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CatalogoEvento;
use App\Models\Alumnos;
use App\Models\AlumnosGrupos;
use App\TipoEvento;
use App\Actividade;
use App\EstatusEvento;
use App\Models\Ciclo;
use App\Models\Grupos;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

class CatalogoEventoController extends Controller
{
 
    /*public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $catalogoevento = CatalogoEvento::where('idCatalogoEvento', 'LIKE', "%$keyword%")
                ->orWhere('idEvento', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('categoria', 'LIKE', "%$keyword%")
                ->orWhere('fechaInicio', 'LIKE', "%$keyword%")
                ->orWhere('fechaFinal', 'LIKE', "%$keyword%")
                ->orWhere('horaInicio', 'LIKE', "%$keyword%")
                ->orWhere('horaTermino', 'LIKE', "%$keyword%")
                ->orWhere('estatusEvento', 'LIKE', "%$keyword%")
                ->orWhere('cupoMaximo', 'LIKE', "%$keyword%")
                ->orWhere('cupoMinimo', 'LIKE', "%$keyword%")
                ->orWhere('titular', 'LIKE', "%$keyword%")
                ->orWhere('sede', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $catalogoevento = CatalogoEvento::latest()->paginate($perPage);
        }

        return view('catalogo-evento.index', compact('catalogoevento'));
    }*/

    public function index(Request $request) 
     {
      if(\Session::get('ciclos')){
        
        $catalogoevento=DB::table('ciclo as cc')
            ->Join('catalogoevento as ce', 'ce.idCatalogoEvento', '=', 'cc.idCiclo')
            ->select('ce.idCatalogoEvento', 'ce.idCiclo','ce.idEvento' ,'ce.descripcion', 'ce.categoria', 'ce.fechaInicio', 'horaInicio')
            ->where('ce.idCiclo','=', $this->getCiclo())
            ->get();
        return view('catalogo-evento.index',['catalogoevento' => $catalogoevento]);

            
      }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }


    public function create()
    {
        return view('catalogo-evento.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        CatalogoEvento::create($requestData);

        return redirect('eventoacti')->with('info', 'Catalogo Evento Guardado con exito!');
    } 


    public function show($id)
    {
        $catalogoevento = CatalogoEvento::findOrFail($id);

        return view('catalogo-evento.show', compact('catalogoevento'));
    }
    public function edit($id)
    {
        $catalogoevento = CatalogoEvento::findOrFail($id);

        return view('catalogo-evento.edit', compact('catalogoevento'));
    }



    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $catalogoevento = CatalogoEvento::findOrFail($id);
        $catalogoevento->update($requestData);

        return redirect('eventoacti')->with('info', 'Catalogo Evento Actualizado con exito!');
     
        
    }

 
    public function destroy($id)
    {
        CatalogoEvento::destroy($id);

        return redirect('eventoacti')->with('info', 'Catalogo Evento Eliminado con exito!');
    }

    public function registroEvento($id)
    /*{

        //Este join une la tabla catalogoevento con la tabla actividades, recogiendo solo el id de la tabla actividades
        //para mostrarlo en la vista de registroEvento como registro por cada evento
            $catalogo_evento_1=CatalogoEvento::findORFail($id);
           $catalogoevento=DB::table('catalogoevento as ce')
            ->join('actividades as a','ce.idCatalogoEvento','=','a.idCatalogoEvento')
            ->select('a.idactividades','a.id_alumno','a.idCiclo','a.idEvento','a.id_grupo', 'a.idCatalogoEvento')
            ->where('a.idCatalogoEvento', '=', $id)
            ->get();
      
        return view('catalogo-evento.registroEvento', ['catalogoevento' => $catalogoevento, 'catalogo_evento_1'=>$catalogo_evento_1]);
    }*/
        {

        //Este join une la tabla catalogoevento con la tabla actividades, recogiendo solo el id de la tabla actividades
        //para mostrarlo en la vista de registroEvento como registro por cada evento
            $catalogo_evento_1=CatalogoEvento::findORFail($id);
           $catalogoevento=DB::table('catalogoevento as ce')
            ->join('actividades as a','ce.idCatalogoEvento','=','a.idCatalogoEvento')
            ->join('alumnos as al', 'a.id_alumno', '=', 'al.id')
            ->leftjoin('alumnosgrupos as algru', 'a.id_alumno', '=', 'algru.id')
            ->select('a.idactividades', 'al.Nombres', 'al.Matricula', 'al.Carrera', 'al.Genero', 'algru.id_grupo')
            ->where('a.idCatalogoEvento', '=', $id)
            ->get();
      
        return view('catalogo-evento.registroEvento', ['catalogoevento' => $catalogoevento, 'catalogo_evento_1'=>$catalogo_evento_1]);
    }

    //esta funciones para ir a la vista de registroAlevento

    public function alevento($id)
    {
       
     //Este join muestra el historial de los catalogos de eventos activos y no activos
        $catalogoevento=DB::table('catalogoevento as ce')
       ->join('estatusevento as es', 'es.idestatusEvento', '=', 'ce.idestatusEvento')
       ->select('ce.idCatalogoEvento', 'ce.idCiclo', 'ce.idEvento', 'ce.descripcion', 'ce.categoria', 'ce.fechaInicio', 'ce.horaInicio', 'ce.sede', 'ce.idestatusEvento')
       ->where('ce.idCatalogoEvento', '=', $id)
       ->get();      
      
        return view('catalogo-evento.registroAlevento', ['catalogoevento' => $catalogoevento]);

    }

    public function historial()
    {

        // este join muestra solo los eventos no activos
       $catalogoevento=DB::table('catalogoevento as ce')
       ->join('estatusevento as es', 'es.idestatusEvento', '=', 'ce.idestatusEvento')
       ->select('ce.idCatalogoEvento', 'ce.idCiclo', 'ce.idEvento', 'ce.descripcion', 'ce.categoria', 'ce.fechaInicio', 'ce.horaInicio', 'ce.sede', 'ce.idestatusEvento')
       ->where('es.idestatusEvento', '=', '2')
       ->get();      
      
        return view('catalogo-evento.registroAlevento', ['catalogoevento' => $catalogoevento]);
       
    }

    public function activos(Request $request)
    {

        //este join muestra solo los eventos activos
        $catalogoevento=DB::table('catalogoevento as ce')
       ->join('estatusevento as es', 'es.idestatusEvento', '=', 'ce.idestatusEvento')
       ->select('ce.idCatalogoEvento', 'ce.idCiclo', 'ce.idEvento', 'ce.descripcion', 'ce.categoria', 'ce.fechaInicio', 'ce.horaInicio', 'ce.sede', 'ce.idestatusEvento')
       ->where('es.idestatusEvento', '=', '1')
       ->get();      
      
        return view('catalogo-evento.eventosActivos', ['catalogoevento' => $catalogoevento]);

    }

    public function buscarAE(Request $request, $id)
    {
        $buscar = $request->get('buscarAlumnosAE');

        $catalogoevento=CatalogoEvento::findOrFail($id);

        $listaAlumno=Alumnos::where('Matricula', 'LIKE', "%$buscar%")->get();
        return view('catalogo-evento.buscarAlumnos', compact('listaAlumno', 'catalogoevento'));
    }

    public function agregarAE(Request $request, $id)
    {
        $nuevoAlumno = new Actividade();

        $nuevoAlumno->id_alumno=$request->Nombres;
        $nuevoAlumno->idCiclo=$request->idCiclo;
        $nuevoAlumno->idEvento=$request->idEvento;
        $nuevoAlumno->descripcion=$request->descripcion;
        $nuevoAlumno->idCatalogoEvento=$request->idCatalogoEvento;
        $nuevoAlumno->save();

        return redirect('buscarAlumnosAE/'.$id)->with('info', 'El registro se realizo con exito!!');
    }
}
