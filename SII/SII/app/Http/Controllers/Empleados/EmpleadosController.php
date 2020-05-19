<?php

namespace App\Http\Controllers\Empleados;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Estado;
use App\Models\Empleado;
use App\Models\User;
use Auth;
use App\Models\ImagenesPrueba;
use App\Models\Town;
use Illuminate\Support\Facades\Session;

 class EmpleadosController extends Controller
{
    

      
      public function inicioPerfil(){

         return view('partials.principal');
      }


      public function crear(){

         //$estado=Estado::lists('name', 'id');
        $state=Estado::All('NOMBRE', 'id');
         return view('admin.empleados.administrativos.crearEmpleado', compact('state'));
      } 

   	public function formularioEmpleado(){

      	$estado=Estado::All();
       	return view('partials.profesores.crearEmpleado', compact('estado'));
   	}

  
      public function createEmpleado(Request $empleado){

       

            $emplea = new Empleado();
               $emplea->NOMBREEMPLEADO=$empleado->nombreEmple;       
               $emplea->GENERO = $empleado->generoEmple;
               $emplea->foto = null;         //foto  
               $emplea->CLAVE_CIUDADANA = $empleado->curpEmple;    
               $emplea->CEDULA_FISCAL = $empleado->rfcEmple;     
               $emplea->ESTADO_CIVIL = $empleado->estadoCivil_Emple;     
               $emplea->FECHA_NACIMIENTO = $empleado->Fecha_nacimiento_Emple;   
               $emplea->ESTADO_NACIMIENTO = $empleado->estado_id;     
               $emplea->LUGAR_NACIMIENTO = $empleado->town;   
               $emplea->CIUDAD = $empleado->ciudadEmple;     
               $emplea->ESTADO = $empleado->estadoEmple;     
               $emplea->EMAIL = $empleado->emailEmple;   
               $emplea->CP = $empleado->cpEmple;   
               $emplea->DOMICILIO = $empleado->domicilioEmple;     
               $emplea->TELEFONO_OFICINA = $empleado->telefonoOficceEmple;   
               $emplea->TELEFONO = $empleado->telefonoEmple;   
               $emplea->CELULAR = $empleado->celularEmple;    
               $emplea->NUMEMPLEADO = $empleado->numEmpleado_Emple;    
               $emplea->FECHA_INGRESO = $empleado->Fecha_ingreso_Emple;   
               $emplea->FECHA_BAJA = $empleado->Fecha_baja_Emple;   
               $emplea->DEPARTAMENTO = $empleado->departamentoEmple;     
               $emplea->CARGO = $empleado->cargoEmple;   
               $emplea->CONTRATO = $empleado->contratoEmple;   
               $emplea->STATUSACTUAL = $empleado->statusEmple;     
               $emplea->NIVEL_ESTUDIOS=$empleado->nivelEstudio;   
               $emplea->TITULADO = $empleado->titulado;    
               $emplea->INSTITUCION_ESTUDIOS = $empleado->almaMater;   
               $emplea->CEDULA_PROFESIONAL = $empleado->cedula;   
               $emplea->ESPECIALIDAD = $empleado->especialidad;   
               $emplea->NOTASDESCRIPCION = $empleado->notasEmple;   
               $emplea->NUMERO_SEGURIDADSOCIAL = $empleado->seguroEmple;     
               $emplea->SUELDO = $empleado->sueldoEmple;     
               $emplea->EMERGENCIA_PERSONA = $empleado->persona_Contacto_Emple;   
               $emplea->EMERGENCIA_TELEFONO = $empleado->telefono_Contacto_Emple;
               $emplea->CONDUCTOR =  $empleado->conductor;
               $emplea->TRABAJO_ANTERIOR =  $empleado->anteriorTrabajoEmple;
               $emplea->CARGO_ANTERIOR =  $empleado->cargoAnteriorEmple;
               $emplea->USERNAME = Auth::user()->name;  //quien lo creo
               $emplea->MUNICIPIO= $empleado->municipioEmple;
               $emplea->FECHA_ACTUALIZACION =  null; 
               $emplea->USERNAME_ACTUALIZA =  null;
       
            $emplea->save();


            Session::flash('message', 'Empleado Creado Con Éxito');
         return redirect('/lista/profesores');

            
      }

     



      public function store(Request $request){

  

        $file = $request->file('image');
        $name = 'fotoEmpleado_' . time() . '.' .$file ->getClientOriginalExtension();
         $path = public_path() . '\img';
         $file->move($path, $name);


         $image = new ImagenesPrueba();
         $image->name = $name;

         $image->save();
          
      
      
      }


   	


   	public function getEmpleado(){

   		return view('partials.profesores.listaProfesores');
   	/*lista de los empleados*/
   	}

}
