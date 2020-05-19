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
            $ventas=DB::table('alumnos as a')
            ->join('alumnocxc as acxc', 'a.id', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.precio as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('ppm.codigoPlan', 'LIKE', '%'. $query. '%')
            ->where('a.Nombres', 'LIKE', '%'. $query. '%')
            ->orwhere('acxc.pagado', 'LIKE', '%'. $query. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->paginate(7);   


            //error no funciona el buscador        
        }

        

        return view('admin.cobranza.ventaPlanes.index',  ["ventas" => $ventas, "searchText" => $query]);
            
    }
    
     public function create(){
            
        $cajas = DB::table('caja')
            ->select('id','descripcion')
            ->orderBy('id', 'desc')
            ->get();
          
         return view("admin.cobranza.ventaPlanes.create", [ "cajas" => $cajas]);   


        }

    


        public function buscarAlumno($dato="")
        {

            $usuarios = VentaUtp::Busqueda($dato);
            $cajas = DB::table('caja')
            ->select('id','descripcion')
            ->orderBy('id', 'desc')
            ->get();
            

            return json_decode($usuarios);
       
        }
           
    


    public function store(Request $request){

            if (\Session::get('ciclos')) {
              
           
            $mytime = Carbon::today('America/Mexico_City');
            $año = $mytime->format('Y');
            $mes = $mytime->format('m');

           
            $idAlumno = $request->get('idAlumno');
            $idPlan= $request->get('pidPLan');
            $idCicloPlan = PlanesPago::find($idPlan)->idCiclo;
            $idCiclos = \Session::get('ciclos')->idCiclo;

             
            $verCuentaAlumno = DB::table('alumnocxc')
                ->where('idCiclo', '=', $idCicloPlan)
                ->orwhere('idPlan', '=', $idPlan)
                ->get();

            $cantidadPlan= PlanesPago::findOrFail($idPlan);
            $ciclo = Ciclo::findOrFail($idCiclos);
           
            /*if(count($verCuentaAlumno)>=1){


                return "<script>var confirmar = confirm('Oye No puedes Cobrar 2 veces el plan a este alumno, en este periodo');if(confirmar == true){location.href ='../crearCxC';}</script>";
            }else{        //  DB:beginTransaction();*/
                
                $venta = new VentaUtp;
                $venta->idAlumno=$request->get('idAlumno');
                $venta->idCiclo=$idCiclos;
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

            

        return Redirect::to('utp/venta/lista/venta/planes');

    }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='../crearCxC';}</script>";


    }

    }




    public function show ($id){

        //despaues un inner join con la tabla de nueva de planes de pago con los datos datos de planes y codigo del plan.
        


            $venta = DB::table('alumnocxc as acxc')
            ->leftjoin('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->leftjoin('alumnopagosdet as apd', 'acxc.idAlumnosCxC', '=','apd.idAlumnoPagosDet')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'apd.fecha', 'apd.idcaja', 'apd.reciboCaja', 'apd.idAlumnoPagosDet')
            ->where('acxc.idAlumnosCxC', '=', $id)
            ->first();


            $detalles=DB::table('alumnocxc as acxc')
            ->leftjoin('planespago as pp','acxc.idPlan', '=' ,'pp.idPlanesPago')
            ->leftjoin('alumnopagosdet as apd', 'acxc.idAlumnosCxC','=','apd.idAlumnoPagosDet')
            ->leftjoin('conceptopago as cc','apd.idPlan', '=' ,'cc.idConceptosPagos')
            ->leftjoin('ciclo as c', 'pp.idCiclo', '=', 'c.idCiclo')
            ->select('acxc.idAlumnosCxC','acxc.cantidadProgramada', 'acxc.pagado', 'apd.cantidad', 'idAlumnoPagosDet', 'cc.precio', 'acxc.cantidadPagada', 'apd.idPlan', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'),DB::raw('concat(c.inicial, " / ", c.final, " / " ,c.periodo) as ciclo'), 'pp.precio as totalPagar', DB::raw('concat(apd.fecha, "/", apd.idcaja , "/", apd.reciboCaja, "/", apd.anio, "/", apd.mes) as diaPago'))
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

    public function cobrar(Request $request)
    {

        try{

        DB::beginTransaction();

        $mytime = Carbon::today('America/Mexico_City');
        $año = $mytime->format('Y');
        $mes = $mytime->format('m');

        $idCuentaXCobrar = $request->get('idAlumnosCxC');
        $cantidadProgramada = $request->get('cantidadProgramada');
        $idAlumno = $request->get('idAlumno');
        $idCiclo = $request->get('idCiclo');
        $idConcepto = $request->get('idConcepto');
        $idPlan = $request->get('idPlan');
        $cont=0;


            while ($cont < count($idCuentaXCobrar)) 
            {

                $buscarPago = VentaUtp::findOrFail($idCuentaXCobrar[$cont]);
                $buscarPago->cantidadPagada=$cantidadProgramada[$cont];
                $buscarPago->pagado="S";
                $buscarPago->update();



             $actualizarPago = new DetalleVentaUtp;
            $actualizarPago->fecha= $mytime;
            $actualizarPago->reciboCaja=$request->folio;
            $actualizarPago->idAlumnoCxC=$idCuentaXCobrar[$cont];
            $actualizarPago->reciboCaja=$request->folio;
            $actualizarPago->anio=$año;
            $actualizarPago->idCaja = $request->idCaja;
            $actualizarPago->idAlumno=$idAlumno[$cont];
            $actualizarPago->idCiclo=$idCiclo[$cont];
            $actualizarPago->idPlan=$idPlan[$cont];
            $actualizarPago->mes=$mes;
            $actualizarPago->idConcepto = $idConcepto[$cont];
            $actualizarPago->recibidoPor = Auth::user()->name;
            $actualizarPago->precio=$buscarPago->cantidadPagada;
            $actualizarPago->cantidad= '1';
            $actualizarPago->save();
                $cont= $cont + 1;
            }


         $salidaJson = array('mensaje' => 'Pago Realizado Con Éxito', 'Respuesta' => true);
         DB::commit();
        return json_encode($salidaJson);

        }catch(\Exception $e)
        {
            DB::rollback();

         throw $e;
        }

        return view ('admin.cobranza.ventaPlanes.modalCobros');
    }

    public function cuenta($dato=" ")
    {

        $usuarios = VentaUtp::Busqueda($dato);
        return json_decode($usuarios);
        
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


           if (is_null($alumno)) {
               return json_encode("No existe una cuenta para este alumno");
           }else{

            return view('admin.cobranza.estadoCuenta', ['query' => $query, 'alumno' => $alumno]);
            }
        }
    }


    public function crearCxC()
    {

        if(\Session::get('ciclos')){

            $folio = DB::table('alumnopagosdet')
                ->select(DB::raw('MAX(reciboCaja) + 1 as folio'))

                ->get();
                //$alumnos = DB::table('alumnos')
                //->select(DB::raw('CONCAT("No. Alumno: " , id , " - ", Paterno, " ", Materno, " ", Nombres ," ",  "Matricula: " , " " ,matricula) as nombre'), 'id')
               // ->where('status', '=', 'A')
                //->get();
            $alumnos = DB::table('alumnos')
                ->select('id','Nombres', 'Paterno', 'Materno', 'Matricula')
                ->orderBy('id', 'Nombres', 'Paterno', 'Materno', 'matricula')
                //->where('acxc.idCiclo', '=', $this->getCiclo())
                ->get();

            $plan = DB::table('planespago')
                ->join('planes_pagomst', 'planespago.idPlanesPagoMST', '=', 'planes_pagomst.idPlanesPagoMST')
                ->join('ciclo', 'planes_pagomst.idCiclo', '=', 'ciclo.idCiclo' )
                ->select('planespago.idPlanesPago', 'ciclo.descripcion', 'planespago.precio', DB::raw('CONCAT(planespago.fechaInicio, " ", "a", " " , planespago.fechaFin) as fechasPago'), 'planes_pagomst.codigoPlan', 'planes_pagomst.idPlanesPagoMST')
                //->orderBy('planespago.idPlanesPago', 'desc')
                    //->limit(1)
                ->where('ciclo.idCiclo', '=', $this->getCiclo())
                ->get();

        return view('admin/cobranza/ventaPlanes/crearCxC', ["folio"=> $folio, "alumnos" => $alumnos, "plan" => $plan]);
    }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }


}

    public function Vista(Request $request){ 
            
            $alumnocxc=DB::table('alumnocxc as acxc')
            ->join('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('planes_pagomst as ppm', 'acxc.idPlan', '=' , 'ppm.idPlanesPagoMST')
            ->join('planespago as pp','ppm.idPlanesPagoMST', '=' ,'pp.idPlanesPago')
            ->join('conceptopago as cc', 'pp.idConceptoPago', '=' , 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'ppm.idPlanesPagoMST' , 'a.id','cc.idConceptosPagos', 'c.idCiclo', 'c.descripcion', DB::raw('concat(pp.fechaInicio, " " , "a", " " , pp.fechaFin) as fechasPago'), 'pp.precio as totalPagar', 'ppm.codigoPlan', 'cc.descripcion as conceptopago')
            ->where('ppm.codigoPlan', 'like', '%'. $dato. '%')
            ->orWhere('a.Nombres', 'like', '%'. $dato. '%')
            ->orWhere('acxc.pagado', 'like', '%'. $dato. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->get();
            
        return view('admin/cobranza/estadoCuenta', ["alunmo"=> $alumno, "ciclo" => $ciclo, "planes_pagomst" => $planes_pagomst, "PlanesPago" => $planespago, "conceptopago" => $conceptopago]);
          
     }
}


