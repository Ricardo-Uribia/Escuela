<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\Estado;
use App\Models\Administrativos;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Town;

class CrudAdminController extends Controller
{
     public function index()
    {
    	
    	return view('admin.empleados.listaProfesores');	
    }

    public function crearEmpleado()
    {
        $state = Estado::all();
    	return view('admin.empleados.administrativos.crearEmpleado')->with(compact('state'));	
    }



    public function edit($id)
    {

        $emple = Empleado::find($id);
        $empleMunicipio = $emple->municipioNacimiento;
        
        $Municipio = Town::find($empleMunicipio);

        $estados= Estado::all();
    	return view('admin.empleados.administrativos.editEmpleado',['emple' => $emple, 'empleMunicipio' => $empleMunicipio, 'estados' => $estados, 'Municipio' => $Municipio]);		
    }

    

    public function update($id, Request $request)
    {
          $mytime = Carbon::now('America/Mexico_City');


        if ($request->file('fotoEmpleado')) {

            $file= $request->file('fotoEmpleado');
            $name = 'fotoEmpleadoNuevo_' .time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\img';
            $file->move($path, $name);
           
        } else {

            $name = "";
        }

        $emple = Empleado::find($id);

        if ($emple->tipo == "6") {

            
            $emple->NombreEmpleado = $request->input('nombre');
            $idEmple = $emple->id;

            $admin = Administrativos::where('idEmpleado', '=', $idEmple)->get();
            $adminID= $admin[0]->id;
           
            $actualizarAdmin = Administrativos::find($adminID);
            $actualizarAdmin->Telefono_Oficina = $request->telefonoOficceEmple;
            $actualizarAdmin->Emergencia_Persona = $request->persona_Contacto_Emple;
            $actualizarAdmin->Emergencia_Telefono = $request->telefono_Contacto_Emple;
            $actualizarAdmin->Trabajo_Anterior = $request->anteriorTrabajoEmple;
            $actualizarAdmin->Cargo_Anterior = $request->cargoAnteriorEmple;
            $actualizarAdmin->Username = Auth()->User()->name;
            $actualizarAdmin->Fecha_Actualizacion = $mytime->toDateTimeString();
            $actualizarAdmin->Username_Actualizado = Auth()->User()->name;

            $actualizarAdmin->update();


            $emple->foto =  $name;
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
      
        

        $emple->save();

        Session::flash('message', 'Usuario Actualizado Exitosamente');

        return redirect('lista/empleado');
    }

     public function delete($id)
    {

         $emple = Empleado::find($id);
        if ($emple->tipo == "6") {
            $idEmple = $emple->id;
            $profe = Administrativos::where('idEmpleado', '=', $idEmple);
            $profe->delete();
        }


        $emple->delete();

    	//mensahe para notificacion

    Session::flash('message', 'Usuario Eliminado Exitosamente');
    return redirect('lista/empleado');
    }

     public function getAdmin(Request $request, $id){

        if ($request->ajax()) {
            $empleado = Empleado::all()->where('tipo', '6');
            return response()->json($empleado);
        }
    }
}
