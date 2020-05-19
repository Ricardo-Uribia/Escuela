<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Support\Facades\Session;
use App\Models\Ciclo;
use App\Models\Grupos;
use DB;

class GrupoProfesorController extends Controller
{
    public function index(){
        
        $empleado = DB::table('empleados as e')
            ->join('profesores as p', 'p.idEmpleado', '=', 'e.id')
            ->select('e.NombreEmpleado', 'e.foto', 'e.departamento', 'p.ClaveProfesor', 'e.id')
            ->where('e.tipo' , '2')
            ->orderBy('e.NombreEmpleado', 'asc')
            ->get();

    	return view('partials.profesores.gruposProfesores', ['empleado' => $empleado]);
        
    }
    
     public function gruposAsignados($id){
        
        if (\Session::get('ciclos')) {
            $idCiclos = \Session::get('ciclos')->idCiclo;
            $ciclo = Ciclo::findOrFail($idCiclos);
            
            $profesor = Empleado::findOrFail($id);
            return view('partials.profesores.asignarGrupo', ["ciclo" => $ciclo, "profesor" => $profesor]);
           
        }else{

            return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../crearCxC';}</script>";
        }
         
    }
    
    public function getGroup(){
        $grupo = Grupos::all();
        return json_decode($grupo);
    }
}
