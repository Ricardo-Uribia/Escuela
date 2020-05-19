<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use App\Models\AlumnosGrupos;
use App\Models\Alumnos;
use App\Models\Empleado;
use App\Models\Niveles;
use App\Models\Ciclo;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class GruposController extends Controller
{



   public function grupos()
     {
      if(\Session::get('ciclos')){
        
        $grupo=DB::table('grupos as g')
            ->leftJoin('niveles as n', 'g.id_Carrera', '=', 'n.id')
            ->leftJoin('empleados as e', 'g.id_Profesor', '=' ,'e.id')
            ->select('g.Cuatrimestre', 'g.Codigo_Grupo','g.Tipo_Grupo' ,'g.Cupo_Maximo', 'g.Diferenciador_Grupo', 'g.Turno', 'g.id_Ciclo', 
                'n.Identificador', 'e.NombreEmpleado', 'g.id')
            ->where('g.id_Ciclo','=', $this->getCiclo())
            ->get();
                   return view('partials.alumnos.grupos.grupos',['grupo' => $grupo]);

            
      }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }


    public function crearGrupo()
 {

            $profe = Empleado::all()->where('tipo', 2);
            $nivel = Niveles::all();
        
    

   	return view('partials.alumnos.grupos.crearGrupo',['profe' => $profe, 'nivel' => $nivel]);
   }
   

   public function store(Request $request)
   {
        if(\Session::get('ciclos')){
            
    $nuevoGrupo = new Grupos();
    $nuevoGrupo->id_Ciclo=\Session::get('ciclos')->idCiclo;
    $nuevoGrupo->Codigo_Grupo=$request->codGrupo;
    $nuevoGrupo->Tipo_Grupo=$request->tipoGrupo;
    $nuevoGrupo->Cupo_Maximo=$request->cupoMax;
    $nuevoGrupo->Turno=$request->turno;
    $nuevoGrupo->id_Carrera=$request->nivel;
    $nuevoGrupo->Cuatrimestre=$request->cuatri;
    $nuevoGrupo->Diferenciador_Grupo=$request->difGrupo;
    $nuevoGrupo->id_Profesor=$request->titular;


      $nuevoGrupo->save();
    return Redirect::to('crear/nuevoGrupo');
    
        }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../grupos';}</script>";
    }

}

  public function edit($id)
    {
      $nuevoGrupo = Grupos::FindOrFail($id);
        $profe = Empleado::all()->where('tipo', 2);
            $nivel = Niveles::all();
        
       return view('partials.alumnos.grupos.editGrupos', ['nuevoGrupo' => $nuevoGrupo, 'profe' => $profe, 'nivel' => $nivel]) ;
    
    }

        public function destroy($id)
    {
        try{
            $nuevoGrupo = Grupos::findOrFail($id);
            $nuevoGrupo->delete();
            return Redirect::to('crear/nuevoGrupo');
        } catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

     public function ver($id)
    {
      $grupo = Grupos::FindOrFail($id);
       return view('partials.alumnos.grupos.alumnosGrupos', ['grupo' => $grupo]) ;
    
    }
    
     public function agregar(Request $request, $id)
    {
         if ($request) 
        {
        

            $query=trim($request->get('searchText'));
            $grupo = Grupos::FindOrFail($id);
            $alumno=DB::table('alumnos')
            
            
            ->select(DB::raw('concat(Nombres," " , Paterno, " ", Materno) as nombre'),'Matricula','Status','Genero','id')
            ->where('Nombres', 'LIKE', '%'. $query. '%')
            ->orwhere('Paterno', 'LIKE', '%'. $query. '%')
            ->orwhere('Materno', 'LIKE', '%'. $query. '%')
            ->orderBy('id', 'desc')
            ->get();


            return view('partials.alumnos.grupos.verGrupo', ['query' => $query, 'alumno' => $alumno, 'grupo' => $grupo]);
            
        }
    }
    
      public function verAlumnos ($id)
    {
      $grupo=Grupos::findOrFail($id);
      $alumnogrupo=DB::table('alumnosgrupos as ag')
            ->join('alumnos as a', 'ag.id_alumno', '=', 'a.id')
            ->select('a.Matricula', 'a.Nombres','a.Paterno','a.Materno','a.Status' ,'a.Genero','ag.id_alumno','ag.id')
            ->where('ag.id_Grupo','=',$id)
            ->orderByRaw ("Paterno")
            ->get();
            return view('partials.alumnos.grupos.alg', ['alumnogrupo' => $alumnogrupo, "grupo" => $grupo]);

    }
    
      public function eliminarAlumno($id)
    {
        $grupos = AlumnosGrupos::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }

     public function buscarAlumno ($id, Request $request)
    {
      $buscar = $request->get ('buscarAlumno');
      $grupo=Grupos::findOrFail($id);

      $listaAlumno=Alumnos::where('Matricula','LIKE',"%$buscar%")->get();
      return view('partials.alumnos.grupos.buscarAlumno', compact('listaAlumno','grupo'));

    }


    
    public function agregarAlumno(Request $request, $id)
    {

      if(\Session::get('ciclos')){
            
    $nuevoAlumno = new AlumnosGrupos();
    $nuevoAlumno->id_Ciclo=\Session::get('ciclos')->idCiclo;
    $nuevoAlumno->id_grupo=$id;
    $nuevoAlumno->id_alumno=$request->get('idalumno');
    $nuevoAlumno->save();

    return Redirect::to('/buscarAlumno/'.$id)->with('status','Alumno agregado exitosamente');

    }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../grupos';}</script>";
    }
}
} 

    
