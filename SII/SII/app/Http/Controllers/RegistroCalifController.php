<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use App\Models\Empleado;
use App\Momento;
use App\Profesor;
use App\Models\Grupos;
use App\ProfesorGrupo;
use App\Models\AlumnosGrupos;
use App\AlumnoKardex;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class RegistroCalifController extends Controller
{
  
  public function index(Request $request){
    $idMomento       = $request->get('momento');
    $asignacion = $request->get('Asignatura');

    if(\Session::get('ciclos')){
      if (!empty($idMomento)) {
      if($idMomento == 1){

      $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
      $momento = Momento::all();
       $academico=DB::table('profesor_grupo as pg')
            ->join('alumnosgrupos as ag', 'pg.id_Grupo', '=', 'ag.id_grupo')
            ->leftjoin('alumnos as a', 'ag.id_alumno', '=', 'a.id' )
            ->select('ag.id_alumno','pg.idProfesorGrupo','pg.p1','pg.p2','pg.p3','pg.idProfesor','pg.id_Grupo','pg.idPlan','pg.idAsignatura','pg.idCiclo','pg.idNivel', 'a.id', 'a.Paterno','a.Materno', 'a.Nombres','a.Matricula')
            ->where('pg.idCiclo','=', $this->getCiclo())
            ->where('pg.idProfesorGrupo', '=', $asignacion)
            ->orderByRaw ("Paterno")
            ->get();
  
            return view('calificaciones.registroCalificacion', compact('academico','profesorgrupo', 'momento','idMomento','asignacion')); 

      }else if($idMomento == 2){

      $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
      $momento = Momento::all();
      $academico=DB::table('profesorgrupo_prueba as pg')
            ->join('alumnosgrupos as ag', 'pg.idGrupo', '=', 'ag.id_grupo')
            ->leftjoin('alumnos as a', 'ag.id_alumno', '=', 'a.id' )
            ->select('ag.id_alumno', 'pg.p1','pg.p2','pg.p3','pg.idProfesor','pg.idGrupo','pg.idPlan','pg.idAsignatura','pg.idCiclo', 'a.id', 'a.Paterno','a.Materno', 'a.Nombres','a.Matricula')
            ->where('pg.idCiclo','=', $this->getCiclo())
            ->where('pg.idProfesorGrupo', '=', $idProfesorGrupo)
            ->orderByRaw ("Paterno")
            ->get();
  
            return view('partials.profesores.calificaciones.registroCalificacion', compact('academico','profesorgrupo','momento','idMomento'));  

      }else if($idMomento == 3){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));

        
      }else if($idMomento == 4){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));
      }else if($idMomento == 5){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));

      }else if($idMomento == 6){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));
      }else if($idMomento == 7){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));
      }else if($idMomento == 8){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));
      }else if($idMomento == 9){
        $profesorgrupo = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        $momento = Momento::all();
         return view('partials.profesores.calificaciones.registroCalificacion', compact('profesorgrupo','momento','idMomento'));

      }

    }else{
        $momento = Momento::all();
        $profesorgrupo = ProfesorGrupo::where('idCiclo', '=', $this->getCiclo())->get();
       return view('calificaciones.registroCalificacion', compact('profesorgrupo','momento'));

        }


    }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }
   
  
   public function boletafinal(Request $request){

    if(\Session::get('ciclos')){
      $profesor_grupo = $request->get('profesorgrupo');

          if (!empty($profesor_grupo)) {
            $profesoresgrupos = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();

             $alumnoskardex = AlumnoKardex::where('idProfesorGrupo', '=', $profesor_grupo)
             // ->where('idCriterio', '=', 1)
             ->get();

            $alumnoskardex=DB::table('alumnos as a')
            ->leftJoin('alumno_kardex as p1','a.id','=','p1.idAlumno', function ($leftjoin){
            $leftJoin->on('p1.idCriterio','=',1);
            })
            ->leftJoin('alumno_kardex as p2','a.id','=','p2.idAlumno', function ($leftjoin){
            $leftJoin->on('p1.idCriterio','=',2);
            })
            ->select('a.id','p1.valor as parcial_1','p2.valor as parcial_2','a.Nombres','a.Paterno','a.Materno','a.Matricula')
            ->where('p1.idCiclo', '=' , $this->getCiclo())
            ->get();

            // $sql = "SELECT a.id as alumno, p1.valor as primer_parcial,p2.valor as segundo_parcial,
            //         p3.valor as tercer_parcial from alumnos a
            //         left join alumno_kardex p1 on a.id=p1.idAlumno and p1.idCriterio=1
            //         left join alumno_kardex p2 on a.id=p2.idAlumno and p2.idCriterio=2
            //         left join alumno_kardex p3 on a.id=p3.idAlumno and p3.idCriterio=3
            //         where p1.idCiclo = p1.idCiclo;"


          //   $alumnoskardex = $this->alumnos
          //   ->select(['','','',''])
          //   ->join('customers', 'customers.id', '=', 'orders.customer_id')
          //   ->leftJoin('logs', function($join) {
          //       $join->on('orders.id', '=', 'logs.entity_id');
          //       $join->where('logs.name', '=', EventsLog::EVENT_EMAIL_SENT_ORDER_PAYMENT_REMINDER);
          //       $join->where('logs.entity_type', '=', 'order');
          //   })
          //   ->where('orders.status', Order::STATUS_CREATED)
          //   ->where('orders.created_at', '<=', Carbon::now()->subDay($days))
          //   ->whereNull('logs.entity_id')
          //   ->get();
 
          // return $orders;

           return view('calificaciones.boleta_final', compact('profesoresgrupos','profesor_grupo','alumnoskardex'));

          }else{
             $profesoresgrupos = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
           return view('calificaciones.boleta_final', compact('profesoresgrupos'));

          }

       }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }

   }

   public function reporteTutores(){

    if(\Session::get('ciclos')){

       return view('calificaciones.reporte_tutores');

       }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }

   }

   public function guardarCalificacion (Request $request){
    //obtener los datos de las vista
      $calificaciones = $request->get('calificacion');
      $asistencias    = $request->get('asistencia');
      $ciclo          = $request->get('ciclo');
      $alumnos        = $request->get('alumno');
      $nivel          = $request->get('nivel');
      $momento        = $request->get('momento');
      $criterio       = 1;
      $criterio2      = 2;
      $idProfesorGrupo= $request->get('profesor_grupo');

      //var_dump($calificaciones, $alumnos);
      

      for($i=0;$i<count($alumnos);$i++){
        //recorrer los arreglos 
        $calificacion  = $calificaciones[$i];
        $asistencia    = $asistencias[$i];
        $alumno        = $alumnos[$i];
      
      //Guardar calificacion      
        $alumnokardex = new AlumnoKardex();
        $alumnokardex->idCiclo=$ciclo;
        $alumnokardex->idNivel=$nivel;
        $alumnokardex->idProfesorGrupo=$idProfesorGrupo;
        $alumnokardex->idMomento=$momento;
        $alumnokardex->idCriterio=$criterio;
        $alumnokardex->idAlumno=$alumno;
        $alumnokardex->valor=$calificacion;
        $alumnokardex->save();

        $alumnokardex = new AlumnoKardex();
        $alumnokardex->idCiclo=$ciclo;
        $alumnokardex->idNivel=$nivel;
        $alumnokardex->idProfesorGrupo=$idProfesorGrupo;
        $alumnokardex->idMomento=$momento;
        $alumnokardex->idCriterio=$criterio2;
        $alumnokardex->idAlumno=$alumno;
        $alumnokardex->valor=$asistencia;
        $alumnokardex->save();

      }

      return Redirect::to('/registro/calif/profesores')->with('status','Felicidades!!!, su registro ha sido exitoso :)');

   }

}
