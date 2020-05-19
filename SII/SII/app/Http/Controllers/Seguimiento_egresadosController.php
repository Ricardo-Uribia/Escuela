<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Seguimiento_egresado;
use App\Models\Grupos;
use App\Models\Alumnos;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Seguimiento_egresadosController extends Controller
{

      public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
         if (!empty($keyword)) {
            $seguimiento_egresados = Seguimiento_egresado::where('matricula', 'LIKE', "%$keyword%")       
            ->latest()->paginate($perPage);
         
        } else {
            $seguimiento_egresados = Seguimiento_egresado::latest()->paginate($perPage);
        }
        //$seguimiento_egresados=Seguimiento_egresado::all();
       
        return view('seguimiento_egresados.index', ['seguimiento_egresados'=>$seguimiento_egresados]);
    }

    public function buscar(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
         if (!empty($keyword)) {
            $seguimiento_egresados = Seguimiento_egresado::where('idSeguimientoegresado', 'LIKE', "%$keyword%")
            ->orWhere('matricula', 'LIKE', '%$keyword%')
            ->latest()->paginate($perPage);
         

      
        } else {
            $seguimiento_egresados = Seguimiento_egresado::latest()->paginate($perPage);
        }

        return view('seguimiento_egresados.index', compact('seguimiento_egresados'));
    }

     public function gruposricardo()
    {
        if(\Session::get('ciclos')){
        
        $grupo=DB::table('grupos as g')
            ->leftJoin('niveles as n', 'g.id_Carrera', '=', 'n.id')
            ->leftJoin('empleados as e', 'g.id_Profesor', '=' ,'e.id')
            ->select('g.Cuatrimestre', 'g.Codigo_Grupo','g.Tipo_Grupo' ,'g.Cupo_Maximo', 'g.Diferenciador_Grupo', 'g.Turno', 'g.id_Ciclo', 
                'n.Identificador', 'e.NombreEmpleado', 'g.id')
            ->where('g.id_Ciclo','=', $this->getCiclo())
            ->get();
            
       return view('seguimiento_egresados.grupos',['grupo' => $grupo]);

    }
    else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
}


          public function verAlumnosdeUnGrupo($id)
    {
        $grupo=Grupos::findOrFail($id);

      $alumnogrupo=DB::table('alumnosgrupos as ag')
            ->join('alumnos as a', 'ag.id_alumno', '=', 'a.id')
            ->select('a.Matricula', 'a.Nombres','a.Paterno','a.Materno','a.Status' ,'a.Genero','ag.id_alumno','ag.id')
            ->where('ag.id_Grupo','=',$id)
            ->orderByRaw ("Paterno")
            ->get();
            return view('seguimiento_egresados.ver', ['alumnogrupo' => $alumnogrupo, "grupo" => $grupo]);
            
            
    }

    public function create()
    {
        return view('seguimiento_egresados.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Seguimiento_egresado::create($requestData);

        return redirect()->action('Seguimiento_egresadosController@gruposricardo');
        //return redirect('seguimiento_egresados')->with('flash_message', 'Seguimiento_egresado added!');
    }


    public function show($id)
    {
        $seguimiento_egresado = Seguimiento_egresado::findOrFail($id);

        return view('seguimiento_egresados.show', compact('seguimiento_egresado'));
    }


    public function edit($id)
    {
        $seguimiento_egresado = Seguimiento_egresado::findOrFail($id);

        return view('seguimiento_egresados.edit', compact('seguimiento_egresado'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $seguimiento_egresado = Seguimiento_egresado::findOrFail($id);
        $seguimiento_egresado->update($requestData);

        return redirect('seguimiento_egresados')->with('flash_message', 'Seguimiento_egresado updated!');
    }


    public function destroy($id)
    {
        Seguimiento_egresado::destroy($id);

        return redirect('seguimiento_egresados')->with('flash_message', 'Seguimiento_egresado deleted!');
    }
    
        public function nuevo($id)
    {
        $grupos=Grupos::findOrFail($id);
         
      
        $alumnos=Alumnos::findOrFail($id);
        return view('seguimiento_egresados.nuevo', ['alumnos'=>$alumnos, 'grupos'=>$grupos]);
    }

    public function ver($id)
    {

        $alum=Alumnos::all();
        $alumnos=Alumnos::findOrFail($id);
        return view('seguimiento_egresados.ver2', ['alumnos'=>$alumnos, 'alum'=>$alum]);
    }
}

     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
