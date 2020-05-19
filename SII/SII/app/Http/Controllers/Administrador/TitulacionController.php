<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

use App\Models\Alumno;
use App\User;
use App\Models\Modalidad;
use DB;
use App\Models\Empleado;
use App\Models\ServioSocial;
use App\Models\Empresa;
use View;

class TitulacionController extends Controller
{
      public function index(Request $request)
    {
      //$alumnos = Alumno::where('status' , '=', 'E')->get();

        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $alumnos = DB::table('alumnos')
            ->select('id', 'Nombres', 'Status', 'matricula')
            ->where('Nombres', 'LIKE', '%'. $query . '%')
            ->orderBy('id', 'desc')
            ->paginate(7);

            return view('admin.titulacion.index', ['alumnos' => $alumnos, 'searchText' => $query]);

        }
      
    }

    public function titulacion($id)
    {
      $alumnos = Alumno::find($id);
      $empresaAlumno = $alumnos->empresas;

      return view('admin.titulacion.titulacion', ['alumnos' => $alumnos, 'empresaAlumno' => $empresaAlumno]);
    }

     public function etapa1(Request $request, $id)
     {
        $empresaAlumno = Alumno::findOrFail($id)->empresas;
        $empresa = Empresa::all();
        $idAlumno = Alumno::find($id);

        return view('admin.titulacion.etapa1', ['empresa' => $empresa, 'idAlumno' => $idAlumno, 'empresaAlumno' => $empresaAlumno]);
    
     }

      public function etapa2(Request $request, $id_alumno, $id_estadia)
     {
        $modalidad = DB::table('modalidads as mod')
        ->join('niveles as niv', 'mod.niveles_id', '=', 'niv.id')
        ->select('mod.id', 'mod.description', 'mod.codigoMod', 'mod.nombreDoctoRecept', 'niv.Descripcion_Nivel', 'niv.Identificador')
        ->get();
        $maestros = Empleado::All();

        return view('admin.titulacion.etapa2',['modalidad' => $modalidad, 'maestros' => $maestros]);
     }
     public function etapa3(Request $request, $id)
     {
        return view('admin.titulacion.etapa3');
     }

     public function asesor(Request $request, $id)
     {
         if ($request->ajax()) {
            $empleado = Empleado::all();
            return response()->json($empleado);
        }
     }

    public function storeServicioSocial(Request $request)
    {

        $idAlumno = $request->idAlumno;
        $idEmpresa = $request->empresa;
        $fechaInicio =$request->Inicio;
        $fechaConclusion =$request->Conclusion;
        $supervisorTipo = $request->tipoSupervisor;
        $fechaReconocimiento = $request->recOfi;
        $carrera = $request->carrera;
        
        if ($supervisorTipo == '1') {

            $servicioSocial= $request->SupervisorInterno;

            $alumno = Alumno::findOrFail($idAlumno);
            $alumno->empresas()->attach($idAlumno, ['empresa_id' => $idEmpresa,'fechaIncio' => $fechaInicio, 
            'fechaConclusion' => $fechaConclusion ,'tipoSupervisor' => $supervisorTipo,
            'supervisorNombre' => $servicioSocial,'fechaReconocimiento' => $fechaReconocimiento]);
        }else{
            
            $servicioSocial = $request->SupervisorExterno;

            $alumno = Alumno::findOrFail($idAlumno);
            $alumno->empresas()->attach($idAlumno, ['empresa_id' => $idEmpresa,'fechaIncio' => $fechaInicio, 
            'fechaConclusion' => $fechaConclusion ,'tipoSupervisor' => $supervisorTipo,
            'supervisorNombre' => $servicioSocial,'fechaReconocimiento' => $fechaReconocimiento]);
        }

      
        

        return Redirect::to('utp/titulacion/alumno/'.$idAlumno);

       
    }

    public function editServicioSocial(Request $request, $id){

        $idpivot= settype ($id, "integer");
        $idAlumno = $request->idAlumno;
        $idEmpresa = $request->empresa;
        $fechaInicio =$request->Inicio;
        $fechaConclusion =$request->Conclusion;
        $supervisorTipo = $request->tipoSupervisor;
        $supervisorNombre = $request->SupervisorExterno;
        $fechaReconocimiento = $request->recOfi;

        $user = Alumno::find($idAlumno);
        dd($user->empresas);

        $user->empresas()->updateExistingPivot($idpivot, ['empresa_id' => $idEmpresa,'fechaIncio' => $fechaInicio, 'fechaConclusion' => $fechaConclusion, 'tipoSupervisor' => $supervisorTipo, 'supervisorNombre' => $supervisorNombre,'fechaReconocimiento' => $fechaReconocimiento]);
    }

    public function destroyServicioSocial(Request $request, $empresa, $alumno){
        
       
        $user = Alumno::find($alumno)->empresas()->detach($empresa);

        return Redirect::to('utp/titulacion/alumno/'.$alumno);;
    }
}
