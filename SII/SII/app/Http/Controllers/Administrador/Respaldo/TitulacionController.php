<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Alumnos;
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
    	$alumnos = Alumnos::All();
    	return view('admin.titulacion.index', ['alumnos' => $alumnos]);
    }

    public function titulacion($id)
    {
    	$alumnos = Alumnos::find($id);
    	$empresaAlumno = Alumno::findOrFail($id)->empresas;

     	return view('admin.titulacion.titulacion', ['alumnos' => $alumnos, 'empresaAlumno' => $empresaAlumno]);
    }

     public function etapa1(Request $request, $id)
     {
        $empresaAlumno = Alumnos::findOrFail($id)->empresas;
        $empresa = DB::table('empresas')
            ->select('id','name')
            ->get();
        $combobox = array('' => "Seleccione...") + $empresa;

        $idAlumno = Alumno::find($id);

        return view('admin.titulacion.etapa1', ['empresa' => $empresa, 'idAlumno' => $idAlumno, 'empresaAlumno' => $empresaAlumno, 'combobox' => $combobox]);
    
     }

      public function etapa2(Request $request, $id)
     {
        $modalidad = Modalidad::All();
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
        $supervisorNombre = $request->SupervisorExterno;
        $fechaReconocimiento = $request->recOfi;
       /* if ($supervisorTipo == '1') {
            $servicioSocial->supervisorTipo = $supervisorTipo;
            $servicioSocial->supervisorNombre = $request->SupervisorInterno;
        }else{
            $servicioSocial->supervisorTipo = $supervisorTipo;
            $servicioSocial->supervisorNombre = $request->SupervisorExterno;
        }
*/
      
        $alumno = Alumnos::findOrFail($idAlumno);
        $alumno->empresas()->attach($idAlumno, ['empresa_id' => $idEmpresa,'fechaIncio' => $fechaInicio, 
        'fechaConclusion' => $fechaConclusion, 'tipoSupervisor' => $supervisorTipo,
        'supervisorNombre' => $supervisorNombre,'fechaReconocimiento' => $fechaReconocimiento]);

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

        $user = Alumnos::find($idAlumno);
      
        $user->empresas()->updateExistingPivot($idpivot, ['empresa_id' => $idEmpresa,'fechaIncio' => $fechaInicio, 'fechaConclusion' => $fechaConclusion, 'tipoSupervisor' => $supervisorTipo, 'supervisorNombre' => $supervisorNombre,'fechaReconocimiento' => $fechaReconocimiento]);
    }

    public function destroyServicioSocial(Request $request, $empresa, $alumno){
      
        $user = Alumnos::find($alumno)->empresas()->detach($empresa);
    }
}
