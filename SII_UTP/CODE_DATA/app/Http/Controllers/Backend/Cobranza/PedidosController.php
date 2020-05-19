<?php

namespace App\Http\Controllers\Backend\Cobranza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumnos\Alumno;
use Illuminate\Support\Facades\Session;
use App\Models\Cobranza\Planpago;
use App\Models\Cobranza\Producto;
use DB;
use App\Models\Cobranza\Caja;
use App\Models\Cobranza\Alumnocxc;
use App\Services\Internal\CRUDControllersInterface; 


class PedidosController extends Controller implements CRUDControllersInterface
{
    //GET
    public function index()
    {
        $ventascxc = Alumnocxc::where('ciclo_id',Session::get('ciclos')->id)->paginate(10);
        return view('Backend/Cobranza/CuentasCxC/index')->with('ventascxc', $ventascxc);
    }

    //GET
    public function show()
    {}

    //GET
    public function createForm()
    {
        $alumno= (Session::has('alumno'))?Session::get('alumno'):array();
        $ciclo_id = (Session::has('ciclos'))?Planpago::select('id')->where('ciclo_id',Session::get('ciclos')->id)->get():array();

       
        $folio          = $this->getCaja(1);
        $cajas          = Caja::all();
        return view('Backend/Cobranza/CuentasCxC/Formularios/create')->with(['alumno'=>$alumno,'planespago' => $ciclo_id, 'folio' => $folio, 'cajas' => $cajas]);
    }

    public function getCaja($caja_id)
    {
        $caja = Caja::findOrFail($caja_id);
        $state = 404;
        $response = array();
        $folio = 0;
        if (count($caja->productos) > 0) {
            foreach ($caja->productos as $producto) {
                if ($caja->id == $producto->pivot->caja_id) {
                    $folio = intval($caja->productos->last()->pivot->reciboCaja)+1;
                    $state = 200;
                }
            }
        }else{
            $folio =  $caja->consecutivo;
            $state = 200;
        }
        array_push($response, ['caja_id' => $caja->id,'folio' => $folio, 'state' => $state]);
        return $response;
    }
    //POST
    public function create(Request $r)
    {
        $planespago = Planpago::find($r->planespago_id);
        $consultRegister = Alumnocxc::where('alumno_id', $r->alumno_id)->get();
        foreach ($consultRegister as $alumcxc) {
            foreach ($alumcxc->productos as $details) {
                if($details->tipo == 'PL'){
                    if ($details->id == $planespago->producto->id) {
                        Session::flash("error","Al alumno ya se la asignado este plan");
                        return redirect('/admin/crearcxc/alumno');
                    }else{
                       continue;
                    }
                }
            }
        }
       
        $date = new \DateTime();
        if(!$this->validarFecha($planespago->fechaInicio, $planespago->fechaFin)){
             Session::flash("error","Las fechas programadas no han iniciado o han vencido");
        }else{
           if ($planespago->ciclo_id != Session::get('ciclos')->id) {
               Session::flash("error","El ciclo actual no corresponde con el ciclo del plan");
           }else{
                DB::beginTransaction();
                try {
                    $venta = new Alumnocxc();
                    $venta->pagado = 'N';
                    $venta->alumno_id = $r->alumno_id;
                    $venta->ciclo_id = Session::get('ciclos')->id;
                    $venta->cantidad = 1;
                    $venta->cantidadProgramada = $planespago->producto->precio;
                    $venta->cantidadPagada = '0';
                    $venta->save();
                    $producto_id = $planespago->producto->id;

                    $detventa = array('producto_id' => $producto_id, 'reciboCaja' => $r->folio, 'caja_id' => $r->caja_id ,'anio' =>  $date->format('Y'),'mes' => $date->format('m'));

                    $venta->productos()->attach($venta->id,$detventa);
                    Session::flash("success","Registro guardado con éxito");
                    
                }catch (PDOException $e) {
                    Session::flash("error","Ha ocurrido un error " . e);
                    DB::rollback();
                }
                DB::commit();
                return redirect('/admin/crearcxc/index');
                
            }
        } 
         return $this->createForm();
    }

    //GET
    public function updateForm(Request $r)
    {
    }

    public function edit(Request $r)
    {
    }

    //POST
    public function update(Request $r)
    {
    }  

    //POST JSON
    public function fetch()
    {

    }

    //POST
    public function delete(Request $r)
    {   
        if ($r->pagado == 'S') {
           Session::flash('error', 'Esta cuenta ha sido pagada, no es posible eliminar');
        }else{
            $venta = Alumnocxc::find($r->cuentacxc_id);
            foreach ($venta->productos as $findVenta) {
                $productoAsignado = $findVenta->pivot->producto_id;
                $venta->productos()->detach($productoAsignado);
            }
            $venta->delete();
        }

        return redirect('/admin/crearcxc/alumno');
    }

    //POST
    public function destroy($id)
    {
    }

    public function details(Request $r)
    {
        $cuentacxc = Alumnocxc::find($r->cuentacxc_id);
       // return $cuentacxc->productos[0];
        return view('Backend\Cobranza\CuentasCxC\Formularios\details')->with(['cuentacxc' => $cuentacxc]);
    }

    public function search(Request $searchText)
    {
        $resultados = Alumno::select('id','nombres','matricula','curp','genero')
            ->where('matricula', '=', $searchText->search)
            ->orwhere('nombres', 'LIKE','%'.$searchText->search.'%')
            ->orderBy('id','desc')
            ->get();   
        if (count($resultados) < 0) {
            Session::flash('error', 'No se encontraron datos');
        }
        return redirect('admin/crearcxc/alumno')->with('alumno', $resultados);   
    }

    private function validarFecha($fechaIncio, $fechaFin){
        $date = new \DateTime();
        $fechaActual = $date->format('Y-m-d');
        if ($fechaActual >= $fechaIncio && $fechaActual <= $fechaFin) {
            return true;
        }
        return false;
    }
}
