<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Empleado;
use App\Models\Estado;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Town;
use Illuminate\Support\Facades\Session;

class CrudProfeController extends Controller
{
    public function index()
    {
    	$empleado = Empleado::all()->where('tipo' , '2');
    	return view('admin.empleados.listaProfesores', ['empleado' => $empleado]);	
    }

    public function crearProfesor()
    {
        $state = Estado::all();
    	return view('admin.empleados.profe.create', ['state' => $state]);	
    }



    public function edit($id) ///funcional
    {
    	$emple = Empleado::find($id);
        $empleMunicipio = $emple->municipioNacimiento;
        $path = "/home/utponien/SII/storage/empleados/";
        
        $Municipio = Town::find($empleMunicipio);

        $estados= Estado::all();
       
    	return view('admin.empleados.profe.edit', ['emple' => $emple, 'empleMunicipio' => $empleMunicipio, 'estados' => $estados, 'Municipio' => $Municipio]);		
    }

     public function update($id, Request $request) //funcional
    {

        $archivo = $request->file('file');
      $input = array('image' => $archivo);
      $reglas = array('image' => 'image|mimes:jpeg,jpg,png,bmp|max:2000');
      $validator = Validator::make($input, $reglas);

      if ($request->file('file')) {
        if ($validator->fails()) {

            return "<script>alert('El archivo no es una imagen validad')</script>";
        }else{

            $name = 'fotoEmpleadoNuevo_' .time(). '.' . $archivo->getClientOriginalExtension();
            $r1 = Storage::disk('empleados')->put($name, \File::get($archivo));
            $rutaImagen = "../../storage/empleados/".$name;

        }
      }else {

         $rutaImagen = "";
        } 
        $emple = Empleado::find($id);

        if ($emple->tipo == "2") {

            
            $emple->NombreEmpleado = $request->input('nombre');
            $idEmple = $emple->id;

            $profe = Profesor::where('idEmpleado', '=', $idEmple)->get();
            $profeID= $profe[0]->id;
           
            $actualizarProfe = Profesor::find($profeID);
            $actualizarProfe->ClaveProfesor = $request->claveProfe;
            $actualizarProfe->HorasAdmin = $request->horasAdmin;
            $actualizarProfe->HorasInvestigacion = $request->horasInves;
            $actualizarProfe->HorasDocencia = $request->docencia;
            $actualizarProfe->update();


            $emple->foto =   $rutaImagen;
            $emple->email = $request->email;
            $emple->telefono = $request->telefono;
            $emple->celular = $request->celular;
            $emple->Estado_Actual_ID = $request->estadoActual;
            $emple->municipioActual =  $request->municipioActual;
            $emple->claveCiudadana =  $request->curp;
            $emple->domicilio = $request->domicilio;
            $emple->NumEmpleado = $request->numEmpleado;
            $emple->StatusActual = $request->statusEmple;
            $emple->contrato = $request->contrato;
            $emple->nivelEstudios = $request->nivelEstudio;
            $emple->especialidad = $request->especialidad;
            $emple->sueldo = $request->sueldo;
            $emple->update();
        }   

        Session::flash('message', 'Usuario Actualizado Exitosamente');
        return redirect('lista/empleado');
    }



     public function delete($id) //funcional
    {


        $emple = Empleado::find($id);

        if ($emple->tipo == "2") {
            $idEmple = $emple->id;
            $profe = Profesor::where('idEmpleado', '=', $idEmple);
            $profe->delete();
        }


        $emple->delete();
        //mensahe para notificacion
        Session::flash('message', 'Usuario Eliminado Exitosamente');
    return redirect('lista/empleado');
    }
    

    
    public function getProfesor(Request $request, $id){

        if ($request->ajax()) {
            $towns = Empleado::all()->where('tipo', 2);
            return response()->json($towns);
        }
    }
    
    public function ponderacion(){

      return view('partials.profesores.calificaciones.ponderacion');
   }
   
    public function registroCalificacion(){

      return view('partials.profesores.calificaciones.registroCalificacion');
   }

   public function boletaFinal(){

      return view('partials.profesores.calificaciones.boletaFinal');
   }

   public function reporteTutores(){

      return view('partials.profesores.calificaciones.reporteTutores');
   }

    
}
