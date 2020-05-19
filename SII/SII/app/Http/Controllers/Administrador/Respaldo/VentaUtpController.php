<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\DetalleVentaUtp;

use DB;
use Response;
use App\Models\VentaUtp;
use App\Models\Ciclo;
use DateTime;
use Auth;
use App\Models\ConceptoPago;
use App\Models\PlanesPago;
use Carbon\Carbon;

class VentaUtpController extends Controller
{
    public function __construct()
    {
         
    }

   public function index(Request $request){

        if ($request) 
        {
            $query=trim($request->get('searchText'));  //trim para borrar espacion al inicio como al final
            $ventas=DB::table('alumno as a')
            ->join('alumnocxc as acxc', 'a.idAlumno', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.nombre," " , a.paterno, " ", a.materno) as nombre'), 
                'a.status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.cantidad as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('ppm.codigoPlan', 'LIKE', '%'. $query. '%')
            ->where('nombre', 'LIKE', '%'. $query. '%')
            ->orwhere('acxc.pagado', 'LIKE', '%'. $query. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->paginate(7);           
        }

        

        return view('admin.cobranza.ventaPlanes.index',  ["ventas" => $ventas, "searchText" => $query]);
            
    }
    

    public function create(Request $request){
        
        if ($request) 
        {
            $query=trim($request->get('searchText'));
            $alumno=DB::table('alumnos as a')
            ->join('alumnocxc as acxc', 'a.id', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC',DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status','a.id as idAlumno' ,'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', 'c.idCiclo', 'pp.idConceptoPago' ,'ppm.codigoPlan', 'ppm.idPlanesPagoMST','cc.descripcion as conceptopago')
            ->where('a.Nombres', 'LIKE', '%'. $query. '%')
            ->orwhere('a.Paterno', 'LIKE', '%'. $query. '%')
            ->orwhere('a.Materno', 'LIKE', '%'. $query. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->get();

        }

       
             $cajas = DB::table('caja')
            ->select('id','descripcion')
            ->orderBy('id', 'desc')
            ->get();
          
            if(count($alumno)>=1){            

                 return view("admin.cobranza.ventaPlanes.create", ["alumno" => $alumno, "query" => $query, "cajas" => $cajas]);
              
            }else{

              
                 if ($query) {
                    return "<script>var confirmar = confirm('No existe una cuenta del alumno(a) ".$query."');if(confirmar == true){location.href ='create';}</script>";
                }else{

                    return "<script>var confirmar = confirm('Hemos detectado que no existe los suficientes datos para ver este módulo, recomendamos llenar los datos necesarios primero');if(confirmar == true){location.href ='../../planesPago';};</script>";
                }

            }


        }
           
    


    public function store(Request $request){
           
            $mytime = Carbon::today('America/Mexico_City');
            $año = $mytime->format('Y');
            $mes = $mytime->format('m');

           
            $idAlumno = $request->get('idAlumno');
            $idCiclo = $request->get('idCiclo');
            $idPlan= $request->get('pidPLan');

           
             
            $verCuentaAlumno = DB::table('alumnocxc')
                ->where('idPlan', '=', $idPlan)
                ->where('idAlumno', '=', $idAlumno)
                ->where('idCiclo', '=', $idCiclo)
                ->get();


            $cantidadPlan= PlanesPago::findOrFail($idPlan);
            $ciclo = Ciclo::findOrFail($idCiclo);

            if(count($verCuentaAlumno)>=1){


                return "<script>var confirmar = confirm('No puedes Cobrar 2 veces el plan a este alumno, en este periodo');if(confirmar == true){location.href ='../crearCxC';}</script>";
            }else{        //  DB:beginTransaction();
                
                $venta = new VentaUtp;
                $venta->idAlumno=$request->get('idAlumno');
                $venta->idCiclo=$request->get('idCiclo');
                $venta->anio=$año;
                $venta->mes=$mes;
                $venta->pagado= 'N';
                $venta->cantidadProgramada = $cantidadPlan->precio;
                $venta->inicial = $ciclo->inicial;
                $venta->final = $ciclo->final;
                $venta->periodo = $ciclo->periodo;
                $venta->idPlan=$idPlanesPago = $request->get('pidPLan');
                $venta->idConcepto = $cantidadPlan->idConceptoPago;
                $venta->cantidadPagada = null;
                $venta->save();

            }

        return Redirect::to('utp/venta/plan/create');

    }




    public function show ($id){

        //despaues un inner join con la tabla de nueva de planes de pago con los datos datos de planes y codigo del plan.


            $venta = DB::table('alumnocxc as acxc')
            ->join('alumno as a', 'acxc.idAlumno', '=', 'a.idAlumno')
            ->join('alumnopagosdet as apd', 'acxc.idAlumnosCxC', '=','apd.idAlumnoCxC')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.nombre," " , a.paterno, " ", a.materno) as nombre'), 'a.status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'apd.fecha', 'apd.idcaja', 'apd.reciboCaja')
            ->where('acxc.idAlumnosCxC', '=', $id)
            ->first();


            $detalles=DB::table('alumnocxc as acxc')
            ->join('planespago as pp','acxc.idPlan', '=' ,'pp.idPlanesPago')
            ->join('alumnopagosdet as apd', 'acxc.idAlumnosCxC','=','apd.idAlumnoCxC')
            ->join('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
            ->select('acxc.idAlumnosCxC','acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'),DB::raw('concat(c.inicial, " / ", c.final, " / " ,c.periodo) as ciclo'), 'pp.cantidad as totalPagar', DB::raw('concat(apd.fecha, "/", apd.idcaja , "/", apd.reciboCaja, "/", apd.anio, "/", apd.mes) as diaPago'))
            ->where('acxc.idAlumnosCxC', '=', $id)
            ->get();
        

        return view("admin.cobranza.ventaPlanes.show", ["venta" => $venta, 'detalles' => $detalles]);
    }


    public function destroy($id){

       $eliminarForanea= DB::table('alumnopagosdet')
        ->select('idAlumnoCxC')
        ->where('idAlumnoCxC', '=', $id)->get();
       
        
        if (empty($eliminarForanea)) {
            
            $venta=VentaUtp::findOrFail($id);
            $venta->pagado="C";
            $venta->update();

        }else{

           
           $venta=VentaUtp::findOrFail($id);
            $venta->pagado="E";
            $venta->update();
        }

        return Redirect::to('utp/venta/plan/create');

    }  

    public function cobrar(Request $request, $id)
    {
        try{

        DB::beginTransaction();

        $mytime = Carbon::today('America/Mexico_City');
        $año = $mytime->format('Y');
        $mes = $mytime->format('m');


        $buscarPago = VentaUtp::findOrFail($id);
        $buscarPago->cantidadPagada=$request->cuenta['cantidadProgramada'];
        $buscarPago->pagado="S";
        $buscarPago->update();
        
        $actualizarPago = new DetalleVentaUtp;
        $actualizarPago->fecha= $mytime;
        $actualizarPago->reciboCaja=$request->folio;
        $actualizarPago->idAlumnoCxC=$id;
        $actualizarPago->reciboCaja=$request->folio;
        $actualizarPago->anio=$año;
        $actualizarPago->idCaja = $request->idCaja;
        $actualizarPago->idAlumno=$request->cuenta['idAlumno'];
        $actualizarPago->idCiclo=$request->cuenta['idCiclo'];
        $actualizarPago->idPlan=$request->cuenta['idPlanesPagoMST'];
        $actualizarPago->mes=$mes;
        $actualizarPago->idConcepto = $request->cuenta['idConceptoPago'];
        $actualizarPago->recibidoPor = Auth::user()->name;
        $actualizarPago->precio=$buscarPago->cantidadPagada;
        $actualizarPago->cantidad= '1';
        $actualizarPago->save();


         $salidaJson = array('mensaje' => 'Pago Realizado Con Éxito', 'Respuesta' => true);
         DB::commit();
        return json_encode($salidaJson);

        }catch(\Exception $e)
        {
            DB::rollback();

         throw $e;
        }
    }

    public function cuenta(Request $request)
    {
         if ($request) 
        {
        

            $query=trim($request->get('searchText'));
            $alumno=DB::table('alumnos as a')
            ->join('alumnocxc as acxc', 'a.id', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC',DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.status','a.id' ,'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', 'c.idCiclo',  'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('a.Nombres', 'LIKE', '%'. $query. '%')
            ->orwhere('a.Paterno', 'LIKE', '%'. $query. '%')
            ->orwhere('a.Materno', 'LIKE', '%'. $query. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->get();

           

            return view('admin.cobranza.estadoCuenta', ['query' => $query, 'alumno' => $alumno]);
            
        }
    }

    public function crearCxC()
    {
        $folio = DB::table('alumnopagosdet')
                ->select(DB::raw('MAX(reciboCaja) + 1 as folio'))
                ->get();

                $alumnos=DB::table('alumnos')
                ->select(DB::raw('CONCAT("No. Alumno: " , id , " - ", Paterno, " ", Materno, " ", Nombres ," ",  "Matricula: " , " " ,matricula) as nombre'), 'id')
                ->where('status', '=', 'A')
                ->get();

            $ciclos= DB::table('ciclo')
            ->select(DB::raw('CONCAT("Inicial: " , inicial, " " , "Final: " , final, "Periodo: ", periodo) as ciclo'), 'idCiclo','descripcion')
            ->orderBy('idCiclo', 'desc')
            ->get();

                $plan = DB::table('planespago')
                    ->join('planes_pagomst', 'planespago.idPlanesPagoMST', '=', 'planes_pagomst.idPlanesPagoMST')
                    ->select('planespago.idPlanesPago', 'planespago.precio', DB::raw('CONCAT(planespago.fechaInicio, " ", "a", " " , planespago.fechaFin) as fechasPago'), 'planes_pagomst.codigoPlan', 'planes_pagomst.idPlanesPagoMST')
                    ->orderBy('planespago.idPlanesPago', 'desc')
                    //->limit(1)
                    ->get();


        return view('admin/cobranza/ventaPlanes/crearCxC', ["folio"=> $folio, "alumnos" => $alumnos, "ciclos" => $ciclos, "plan" => $plan]);
    }
}
