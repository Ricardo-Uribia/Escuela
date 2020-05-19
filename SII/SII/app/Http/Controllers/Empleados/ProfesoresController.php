<?php

namespace App\Http\Controllers\Empleados;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Town;
use Illuminate\Support\Facades\Session;
use App\Models\Profesor;

class ProfesoresController extends Controller
{
    public function index(){
    	$state = Estado::all('NOMBRE', 'id');
		return view('partials.profesores.crearProfesor', compact('state'));	
   	} 

   		public function crearProfesor(Request $profesor){

        $profe=Profesor::create([
            'TXTPATERNO' =>$profesor->txtPaterno,
            'TXTMATERNO'=>$profesor->txtMaterno,
            'CLAVEPROFESOR'=>$profesor->claveProfe,
            'NUMEMPLEADO'=>$profesor->numEmpleado,
            'NOMBREPROFESOR'=>$profesor->nombre,
            'GENERO'=>$profesor->genero,
            'FECHA_NACIMIENTO'=>$profesor->Fecha_nacimiento,
            'LUGAR_NACIMIENTO'=>$profesor->town,
            'ESTADO_NACIMIENTO_ID'=>$profesor->estado_id,
            'ESTADO_CIVIL'=>$profesor->estadoCivil,
            'NUMERO_SEGURIDADSOCIAL'=>$profesor->numeroSeguro,
            'CEDULA_FISCAL'=>$profesor->rfc,
            'CLAVE_CIUDADANA'=>$profesor->curp,
            'DOMICILIO'=>$profesor->domicilio,
            'CP'=>$profesor->cp,
            'CIUDAD'=>$profesor->ciudad,
            'ESTADO_ID'=>$profesor->estado,
            'EMAIL'=>$profesor->email,
            'TELEFONO'=>$profesor->telefono,
            'CELULAR'=>$profesor->celular,
            'STATUSACTUAL'=>$profesor->status,
            'FECHA_INGRESO' => $profesor->Fecha_ingreso,
            'NOTASDESCRIPCION' => $profesor->notas,
            'FECHA_BAJA' => $profesor->Fecha_baja,
            'DEPARTAMENTO'=>$profesor->departamento,
            'CARGO'=>$profesor->cargo,
            'TIPOCONTRATO'=>$profesor->contrato,
            'NIVEL_ESTUDIOS'=>$profesor->nivelEstudio,
            'TITULADO'=>$profesor->titulado,
            'INSTITUCION_ESTUDIOS'=>$profesor->almaMater,
            'CEDULA_PROFESIONAL'=>$profesor->cedula,
            'ESPECIALIDAD'=>$profesor->especialidad,
            'HORASADMINISTRATIVAS'=>$profesor->horasAdmin,
            'HORASINVESTIGACION'=>$profesor->horasInves,
            'HORASDOCENCIA'=>$profesor->docencia,
            'SUELDO'=>$profesor->sueldo,
  
           
         ]);

      	Session::flash('message', 'Profesor Creado Con Éxito');
      	return redirect('/lista/profesores');
   	}

   	 public function getTowns(Request $request, $id){

      if ($request->ajax()) {
         $towns = Town::towns($id);
         return response()->json($towns);
      }
    }

}
