<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\EvaluacionDocente;
use App\Models\Preguntased;
use App\Models\AlumnosGrupos;
use App\AlumnoKardex;
use App\ProfesorGrupo;
use App\Models\Grupos;
use App\Models\Ciclo;
use App\Models\Planed;
use Illuminate\Support\Facades\DB;


class EvaluaciondocenteController extends Controller
{
    public function alumno_ev_docente(Request $request)
     {
             $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $evaluaciondocente = EvaluacionDocente::where('id', 'LIKE', "%$keyword%")
                ->orWhere('idCiclo', 'LIKE', "%$keyword%")
                ->orWhere('idAlumno', 'LIKE', "%$keyword%")
                ->orWhere('idGrupo', 'LIKE', "%$keyword%")
                ->orWhere('idAsignatura', 'LIKE', "%$keyword%")
                ->orWhere('idProfesor', 'LIKE', "%$keyword%")
                ->orWhere('idPregunta', 'LIKE', "%$keyword%")
                ->orWhere('statused', 'LIKE', "%$keyword%")
                ->orWhere('resultado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $evaluaciondocente = EvaluacionDocente::latest()->paginate($perPage);
        }
        //$evaluaciondocente=Preguntased::all();
        $evaluaciondocente=EvaluacionDocente::all();


      return view ('partials.evaluaciondocente.evaluacion', compact('evaluaciondocente'));
    }

    public function asignarplaned(){


        $profesorgrupo=ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        //$alumno_kardex=AlumnoKardex::all();
        $planed=Planed::all();

            
  
       $alumno_kardex=DB::table('alumno_kardex as ak')
                        ->leftjoin('profesor_grupo as pg', 'ak.idProfesorGrupo','=','pg.idProfesorGrupo')
                        ->select('ak.idCiclo','ak.idAlumno','pg.id_Grupo','pg.idAsignatura','pg.idProfesor')
                        ->where('ak.idCiclo','=', $this->getCiclo())
                        ->get();

        
    return view('partials.evaluaciondocente.asignarplaned', compact('planed','profesorgrupo','alumno_kardex'));

        
    }
    //public function store(Request $request)
    //{
        //}



     public function vistaalumno()
    {
        return view('partials.evaluaciondocente.introduccion');
    }



      //funciones de los submodulos de reportes 
     public function reportegrupo(){
    
     return view('partials.evaluaciondocente.vistaGruposED');
            
    }

     public function reporteprofesor(){
        return view('partials.evaluaciondocente.reporteprofesor');
    }
    
     public function planevaluacion(){
        return view('partials.evaluaciondocente.planevaluacion');
    }

    public function presentacion(){

        return view('partials.evaluaciondocente.vistapresentacioned');
    }

    /*

    public function show($id)
    {
        //
    }

    public function edit($id) //$id
    {
       
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }*/
}

