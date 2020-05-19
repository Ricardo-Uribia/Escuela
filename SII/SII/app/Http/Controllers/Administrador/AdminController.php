<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profesor;
use App\Models\Empleado;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Town;
use App\Http\Requests\AdminCreateEmpleadoRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Administrativos;
use Carbon\Carbon;
use App\Models\Estado;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Ciclo;

class AdminController extends Controller
{


    public function sessionCiclo($id)
    {
        $mensajeok=false;
        $mensajeResul="No se encontro";

        $folio = DB::table('ciclo')
          ->select('idCiclo','descripcion')
          ->where('idCiclo', '=', $id)
          ->get();

        //$codigoCiclo = $folio[0]->codigoCorto;
         
         if (\Session::get('ciclos')) {
            $ciclo = \Session::get('ciclos');
            
            if($ciclo->idCiclo == $id){
              $ciclo = (object) array('idCiclo' => $id);
              \Session::put('ciclos', $ciclo);
            }else{

              \Session::forget('ciclos');
              $ciclo = (object) array('idCiclo' => $id);

              \Session::put('ciclos', $ciclo);
          
            }

         }else{

           $ciclo = (object) array('idCiclo' => $id);
         \Session::put('ciclos', $ciclo);


         }
          
        /*if($ciclo->idCiclo == $id){

          
           $ciclo = (object) array('idCiclo' => $id);

           \Session::put('ciclos', $ciclo);
         
        }else{

          \Session::forget('ciclos');
          $ciclo = (object) array('idCiclo' => $id);

           \Session::put('ciclos', $ciclo);
          
        }
        }*/

          if (count($folio)>0) {
            $mensajeok=true;
            $mensajeResul=$id;
         
          }

          $salidaJson = array('respuesta' => $mensajeok, 'mensaje' =>$mensajeResul);
          return json_encode($salidaJson);

    }

 
 public function index(){

    $usuario = Auth::user();

	return view('home', ['usuario' => $usuario]);
	
   }

  public function getEmpleado1()
   {
     
       return view('admin.empleados.listaProfesores');
   } 


public function store(Request $request)
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
       

         $mytime = Carbon::now('America/Mexico_City');
         $idEmpleado=0;



         $emple=Empleado::create([
            'txtPaterno' =>$request->txtPaterno,
            'txtMaterno'=>$request->txtMaterno,
            'NumEmpleado'=>$request->numEmpleado,
            'NombreEmpleado'=>$request->nombre,
            'foto' =>  $rutaImagen,
            'genero'=>$request->genero,
            'fechaNacimiento'=>$request->Fecha_nacimiento,
            'municipioNacimiento'=>$request->municipioNacimiento,
            'estado_id'=>$request->estadoNacimiento,
            'estadoCivil'=>$request->estadoCivil,
            'numeroSeguroSocial'=>$request->numeroSeguro,
            'cedulaFiscal'=>$request->rfc,
            'claveCiudadana'=> $request->curp,
            'domicilio'=>$request->domicilio,
            'cp'=>$request->cp,
            'Estado_Actual_ID'=>$request->estadoActual,
            'municipioActual'=> $request->municipioActual,
            'email'=>$request->email,
            'telefono'=>$request->telefono,
            'StatusActual'=>$request->statusEmple,
            'celular'=>$request->celular,
            'STATUSACTUAL'=>$request->status,
            'fecha_Ingreso' => $request->Fecha_ingreso,
            'notasDescripcion' => $request->notas,
            'fecha_Baja' => $request->Fecha_baja,
            'departamento'=>$request->departamento,
            'cargo'=>$request->cargo,
            'contrato'=>$request->contrato,
            'nivelEstudios'=>$request->nivelEstudio,
            'titulado'=>$request->titulado,
            'institucionEstudios'=>$request->almaMater,
            'cedulaProfecional'=>$request->cedula,
            'especialidad'=>$request->especialidad,
            'sueldo'=>$request->sueldo,
            'tipo' => $request->tipo,
            'created_at'=> $mytime->toDateTimeString()
            
         ]);

         $idEmpleado = $emple->id;



        if ($request->tipo == "2") {

           $profe= Profesor::create([
            'idEmpleado' => $idEmpleado,
            'ClaveProfesor' => $request->claveProfe,
            'HorasAdmin' => $request->horasAdmin,
            'HorasInvestigacion' => $request->horasInves,
            'HorasDocencia' => $request->docencia,
            
            ]);


        }elseif ($request->tipo== "6"){
             
            $admin= Administrativos::create([
            'idEmpleado' => $idEmpleado,
            'Telefono_Oficina' => $request->telefonoOficceEmple,
            'Emergencia_Persona' => $request->persona_Contacto_Emple,
            'Emergencia_Telefono' => $request->telefono_Contacto_Emple,
            'Trabajo_Anterior' => $request->anteriorTrabajoEmple,
            'Cargo_Anterior' => $request->cargoAnteriorEmple,
            'Username' => Auth()->User()->name,
            'Fecha_Actualizacion' => $mytime->toDateTimeString(),
            'Username_Actualizado' => Auth()->User()->name,
            
            ]);

        }
       
    	 Session::flash('message', 'Usuario Registrado Exitosamente');

             return redirect('/empleado');
             
    }

    public function getEmpleado(Request $request){

       if ($request->ajax()) {
        $empleado = Empleado::all();
        $state = DB::table('estados as es')
        ->select(' es.NOMBRE', 'em.Estado_Actual_ID')
        ->join('empleados as em', 'es.id', '=' ,'em.Estado_Actual_ID');

        return json_encode($empleado);
        }
    
   }

   public function getTowns(Request $request, $id){

        if ($request->ajax()) {
            $towns = Town::towns($id);
            return response()->json($towns);
        }
    }

    public function updateUser(Request $request, $id){

 
        $usuario = User::find($id);
        $emple = $usuario->empleados[0]->id;
        $empleActu = Empleado::find($emple);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();


        $empleActu->email = $usuario->email;
        $empleActu->NombreEmpleado = $usuario->name;
        $empleActu->save();


        return redirect::To('/home');

    }
    
    public function adminUser(){

        $empleados = Empleado::all();
        return view('adminUser', ['empleados' => $empleados]);

    }


        public function getDateUser(Request $request)
    {
         if ($request->ajax()) {
            $Empleado = Empleado::all();
            return response()->json($Empleado);
        }
    }  

    public function getDateUserEmail(Request $request, $id)
    {
         if ($request->ajax()) {
            $Empleado = Empleado::empleado($id);
            return response()->json($Empleado);
        }
    }  

    public function getDataAlum(Request $request)
    {
     if ($request->ajax()) {
            $Empleado = Alumno::all();
            return response()->json($Empleado);
        }
    }

    public function getDataAlumEmail(Request $request, $id)
    {
     if ($request->ajax()) {
            $Empleado = Alumno::alumno($id);
            return response()->json($Empleado);
        }
    }

    public function addUserSystem(Request $request){

      $user_id = $request->user_id;
      $nombre=Empleado::find($user_id);
      $email = $request->email;
      $password = $request->password;
      $role = $request->role;

      if(isset($request->id)){
        //update the pro
        $id = $request->id;
        $add_user = User::where('id', '=', $id);
        $add_user->email = $email;
        $add_user->name = $nombre->NombreEmpleado;
        $add_user->password = bcrypt($password);
        $add_user->role = $role;
        $add_user->save();

      }else{
        // now insert the new Product
        $add_user = new User();
        $add_user->email = $email;
        $add_user->password = bcrypt($password);
        $add_user->role = $role;
        $add_user->name = $nombre->NombreEmpleado;
        $add_user->save();


        $nombre->user_id = $add_user->id;
        $nombre->save();
    }
      if($add_user){
        echo "done";
      }else{
        echo "Error";
      }
    
    }  

}
