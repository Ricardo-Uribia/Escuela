<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\DetalleVentaUtp;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\VentaUtp;
use DateTime;
use Carbon\Carbon;
use App\Models\Ciclo;
use Auth;

class ConceptosVentaController extends Controller
{
    public function __construct()
    {
    	 
    }

   public function index(Request $request){

      
            $query=trim($request->get('searchText'));  //trim para borrar espacion al inicio como al final


             $ventas=DB::table('alumnos as a')
            ->join('alumnocxc as acxc', 'a.id', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('alumnopagosdet as appd', 'acxc.idAlumnosCxC','=','appd.idAlumnoCxC')
            ->join('conceptopago as cc', 'appd.idConcepto', '=', 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', 'cc.codigoConcepto', 'cc.precio', 'cc.impuesto', 'cc.idCuenta', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.cantidadProgramada', 'appd.idConcepto' ,'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', DB::raw('concat(appd.fecha, "/", appd.idcaja , "/", appd.reciboCaja, "/", appd.anio, "/", appd.mes) as diaPago'))
            ->where('appd.idPlan', '=', Null)
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->paginate(7);
                
            return view('admin.cobranza.conceptos.index', ["ventas" => $ventas, "searchText" => $query]);
            
    }

    public function create(){

    	$alumnos=DB::table('alumnos')
        ->select(DB::raw('CONCAT("No. Alumno: " , id , " - ", Paterno, " ", Materno, " ", Nombres , " " ,"Matricula: ", Matricula) as nombre'), 'id')
    	->where('status', '=', 'A')
    	->get();

        $ciclos = DB::table('ciclo')
            ->select('idCiclo','fechaFinal', 'descripcion')
            ->orderBy('idCiclo', 'desc')
            ->get();


        $plan = DB::table('conceptopago')
            ->select('idConceptosPagos','codigoConcepto', 'precio', 'impuesto')
            ->orderBy('idConceptosPagos', 'desc')
            ->get();

        $cajas = DB::table('caja')
            ->select('id','descripcion')
            ->orderBy('id', 'desc')
            ->get();



    	
    	return view("admin.cobranza.conceptos.create", ["alumnos" => $alumnos, "plan" => $plan, "ciclos" => $ciclos, "cajas" => $cajas]);
    }


    public function store(Request $request){

 $Ciclo = Ciclo::find($request->get('idCiclo'));
           
          //  DB:beginTransaction();
        try{
            DB::beginTransaction();

            $mytime = Carbon::today('America/Mexico_City');
            $mytime->toDateTimeString();
            $a«Ðo = $mytime->format('Y');
            $mes = $mytime->format('m');

            $venta = new VentaUtp;
            $venta->idAlumno=$request->get('idAlumno');
            $venta->idCiclo=$request->get('idCiclo');
            $venta->inicial=$Ciclo->inicial;
            $venta->final=$Ciclo->final;
            $venta->periodo=$Ciclo->periodo;
            //$venta->idConcepto=$request->get('idConceptosPagos');
            $venta->folio=$request->get('folio');
            $venta->anio=$a«Ðo;
            $venta->mes=$mes;
            $venta->pagado= 'S';
            $venta->cantidadProgramada = $request->get('total_venta');
            $venta->cantidadPagada = $venta->cantidadProgramada;

            $venta->save();

            
            $idAlumno = $request->get('idAlumno');
            $idCiclo = $request->get('idCiclo');
            $idConceptosPagos = $request->get('idConceptosPagos');
            $precio = $request->get('precio');
            $cantidad = $request->get('cantidad');
            $folio = $request->get('folio');
            $userAuth = Auth::user()->name;
            $cont=0;


            while ($cont < count($idConceptosPagos)) 
            {

                $detalle = new DetalleVentaUtp;
                $detalle->idAlumnoCxC= $venta->idAlumnosCxC;
                $detalle->reciboCaja = $folio;
                $detalle->idAlumno = $idAlumno;
                $detalle->idCiclo = $idCiclo;
                $detalle->idcaja= $request->get('idCaja');
                $detalle->fecha = $mytime;
                $detalle->reciboCaja=$request->get('folio');
                $detalle->anio=$a«Ðo;
                $detalle->mes=$mes;
                $detalle->recibidoPor = $userAuth;
                $detalle->idConcepto= $idConceptosPagos[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->save();
                $cont= $cont + 1;
            }

        
                DB::commit();

             return Redirect::to('utp/venta/concepto');
    }catch(\Exception $e)
        {
            DB::rollback();

         throw $e;
        }
    }




    public function show ($id){


            $venta = DB::table('alumnocxc as acxc')
            ->join('alumnos as a', 'acxc.idAlumno', '=', 'a.id')
            ->join('alumnopagosdet as apd', 'acxc.idAlumnosCxC', '=','apd.idAlumnoCxC')
            ->join('conceptopago as cc','apd.idConcepto', '=' ,'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC',  DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 'a.Status', 'acxc.cantidadProgramada','cc.codigoConcepto' ,'acxc.pagado', 'acxc.cantidadPagada', 'apd.fecha', 'apd.idCaja', 'apd.reciboCaja', 'apd.anio', 'apd.mes')
            ->where('acxc.idAlumnosCxC', '=', $id)
            ->first();
    

            $detalles=DB::table('alumnocxc as acxc')
            ->join('alumnopagosdet as apd', 'acxc.idAlumnosCxC','=','apd.idAlumnoCxC')
            ->join('conceptopago as cc','apd.idConcepto', '=' ,'cc.idConceptosPagos')
            ->join('ciclo as c', 'acxc.idCiclo', '=', 'c.idCiclo')
            ->select('acxc.idAlumnosCxC', 'acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada','cc.codigoConcepto','cc.impuesto','apd.cantidad','cc.precio', DB::raw('concat(c.inicial, " / ", c.final, " / " ,c.periodo) as ciclo'), DB::raw('concat(apd.fecha, "/", apd.idcaja , "/", apd.reciboCaja, "/", apd.anio, "/", apd.mes) as diaPago'))
            ->where('acxc.idAlumnosCxC', '=', $id)
            ->get();
            
         
    

        return view("admin.cobranza.conceptos.show", ["venta" => $venta, 'detalles' => $detalles]);

    }


    public function destroy($id){

       $eliminarForanea= DB::table('alumnopagosdet')
        ->select('idAlumnoCxC')
        ->where('idAlumnoCxC', '=', $id);
       
        $eliminarForanea->delete();

        $venta=VentaUtp::findOrFail($id);
        $venta->pagado="N";
        $venta->update();

        return Redirect::to('utp/venta/concepto/');

    }  


public function buscarConceptoCobro(Request $request)
{

    if ($request) {
       $query=trim($request->get('searchText'));

            $ventas=DB::table('alumnos as a')
            ->join('alumnocxc as acxc', 'a.id', '=', 'acxc.idAlumno')
            ->join('ciclo as c', 'acxc.idCiclo', '=' ,'c.idCiclo')
            ->join('alumnopagosdet as appd', 'acxc.idAlumnosCxC','=','appd.idAlumnoCxC')
            ->join('conceptopago as cc', 'appd.idConcepto', '=', 'cc.idConceptosPagos')
            ->select('acxc.idAlumnosCxC', 'cc.codigoConcepto', 'cc.precio', 'cc.impuesto', 'cc.idCuenta', DB::raw('concat(a.Nombres," " , a.Paterno, " ", a.Materno) as nombre'), 
                'a.Status', 'acxc.idConcepto as conceptoCuenta','acxc.cantidadProgramada', 'acxc.pagado', 'acxc.cantidadPagada', 'c.descripcion', DB::raw('concat(appd.fecha, "/", appd.idcaja , "/", appd.reciboCaja, "/", appd.anio, "/", appd.mes) as diaPago'))
            ->where('acxc.idAlumnosCxC', 'LIKE', '%'. $query. '%')
            ->orwhere('a.Nombres', 'LIKE', '%'. $query. '%')
            ->orwhere('acxc.pagado', 'LIKE', '%'. $query. '%')
            ->orderBy('acxc.idAlumnosCxC', 'desc')
            ->groupBy('acxc.idAlumnosCxC')
            ->paginate(7);


             return view('admin.cobranza.conceptos.index', ["ventas" => $ventas, "searchText" => $query]);
    }
 
 }  
}