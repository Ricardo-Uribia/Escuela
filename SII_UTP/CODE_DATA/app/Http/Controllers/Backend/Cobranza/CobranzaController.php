<?php

namespace App\Http\Controllers\Backend\Cobranza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cobranza\Caja;
use App\Models\Cobranza\Producto;
use App\Models\Alumnos\Alumno;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use App\Models\Cobranza\Alumnocxc;
use App\Services\Internal\Carrito;
use App\Models\Configuracion\Ciclo;
use App\Models\Cobranza\Concepto;
use App\Services\Internal\ShoppingCart;
use Illuminate\Support\Collection as Collection;
use Auth;	
use Redirect;
use DB;

class CobranzaController extends Controller
{

	function __construct(){
	}
	
	public function collectionPlans()
	{
	    $folio 			= $this->getCaja(1);
		$cajas 			= Caja::all();
		$oldCart 		= Session::get('CARRITO_PL');
        $cart 			= ShoppingCart::getInstance($oldCart);
		return view('Backend/Cobranza/create')
			->with(['cajas' => $cajas, 'folio' => $folio,  'carro' => $cart,
            'products' => Session::has('CARRITO_PL') ? $cart->products : null,
            'totalPrecio' => Session::has('CARRITO_PL') ? $cart->totalPrice : null ]);
	}

	public function collectionConcepts(){
		$folio 				= $this->getCaja(1);
		$cajas 				= Caja::all();
		$oldCart 			= Session::get('CARRITO_CN');
        $cart 				= ShoppingCart::getInstance($oldCart);
		$productsCN			= Producto::where('tipo','CN')->get();
		return view('Backend/Cobranza/conceptocreate')->with(['cajas' => $cajas, 'folio' => 
			$folio, 'conceptos' => $productsCN ,'carro' => $cart,
            'products' => Session::has('CARRITO_CN') ? $cart->products : null,
            'totalPrecio' => Session::has('CARRITO_CN') ? $cart->totalPrice : null ]);
	}


	public function buscarPlanPagoAlumno(Request $r)
	{
		$txtsearch = ($r->search!=null)?$r->search:0;
		$searchType = $r->type;
		$datos = array();
		$state = 404;
		$data = "No hay datos disponibles";
		$alumnos = $this->buscarAlumno($txtsearch);
		if (count($alumnos)>0) {
			if ($searchType == "cconcep") {
				foreach ($alumnos as $alumno) {
					array_push($datos, ["alumno" => ["id" => $alumno->id,"nombre" => $alumno->getNombreCompleto(), "matricula" => $alumno->matricula]]);
				}
			}elseif ($searchType == "cplan") {
				foreach ($alumnos as $alumno) {
					foreach ($alumno->alumnocxc->where('ciclo_id',Session::get('ciclos')->id) as $cuentasAlumno) {
						if ($cuentasAlumno->pagado != 'S') {
							$cantPagar = ($cuentasAlumno->pagado == 'P')?intval($cuentasAlumno->cantidadProgramada)-intval($cuentasAlumno->cantidadPagada):$cuentasAlumno->cantidadProgramada;
							foreach ($cuentasAlumno->productos as $producdet) {
								array_push($datos,["alumno" => ["alumnoID" => $alumno->id, "nombre"=>$alumno->getNombreCompleto(), "matricula"=> $alumno->matricula],"alumnocxc" => ["id" => $cuentasAlumno->id,"pagado" => $cuentasAlumno->pagado, "cantidad" => $cuentasAlumno->cantidad, "precio" => $cantPagar, 'ciclo' => $cuentasAlumno->ciclo->codigo_corto], "producto" => ["productoID" => $producdet->id, "codigo" => $producdet->codigo, "descripcion" => $producdet->descripcion]]); 
							}
						}else{
							$state = 404;
							$data = "El alumno no cuenta con cuentas disponibles";
						}
					}
				}
			}	
		}	

		if (!empty($datos)) {
			$state = 200;
			$data = $datos;
		}
		

		return response()->json(['status'=>$state, 'data' => $data]);
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


	public function buscarAlumno($query)
	{
		
		$alumnos = Alumno::select('id', 'nombres', 'paterno', 'materno', 'matricula')
				->where('nombres', 'LIKE','%'.$query.'%')
				->orwhere('matricula', $query)
				->get();
		return $alumnos;
	}

	public function registrarPago(Request $r)
	{	
		if (Session::has('CARRITO'.$r->type)) {
			$oldCart 		= 	Session::get('CARRITO'.$r->type);
       		$cart 			=  	ShoppingCart::getInstance($oldCart);
       		$cantidad 		= $cart->totalQuantity;

			$total  		= number_format($cart->totalPrice * $r->iva);
			foreach ($cart->products as $key => $product) {
				if ($product['student_id'] == $product['student_id']) {
					$alumno 	= Alumno::find($product['student_id']);
				}else{
					Session::flash('error', 'Ah ocurrido un error');
				}
			}
			DB::beginTransaction();
			try {
				$pagoDetail = array('fechaPago' => date('Y-m-d'), 'caja_id' => 1, 'recibidoPor' => Auth::user()->name, 'anio' => date('Y'), 'mes' => date('m'));
				if (Session::has('CARRITO_PL')) {
					$route = 'admin/cobranza';
					$alumnocxc = $alumno->alumnocxc->where('pagado','N');
					foreach ($alumnocxc as $key => $value) {
						$alumnocxc = Alumnocxc::find($value->id);
						$alumnocxc->pagado = 'S';
						$alumnocxc->cantidadPagada = $alumnocxc->cantidadProgramada;
						$alumnocxc->save();
						$ids = $value->productos()->allRelatedIds();
						foreach ($ids as $id) {
							$value->productos()->updateExistingPivot($id,$pagoDetail);
						}
					}

				}else{
					$route = 'admin/cobranza/conceptos/esporadicos';
					$alumnocxc = Alumnocxc::create([
						'pagado' 				=> 'S',
						'ciclo_id'				=> Session::get('ciclos')->id,
						'alumno_id' 			=> $alumno->id,
						'cantidadProgramada'	=> $cart->totalPrice * $r->iva,
						'cantidadPagada' 		=> $cart->totalPrice * $r->iva,
						'cantidad' 				=> $cantidad					
					]);
					$pagoDetailAct = array_merge($pagoDetail, ['reciboCaja' => $r->folio]);
					foreach ($cart->products as $key => $productos) {
						$ID 	= $productos['products']['id'];
						$alumnocxc->productos()->attach($ID, $pagoDetailAct);
					}
				}
				Session::forget('CARRITO'.$r->type);
				Session::flash('success', 'Cobro realizado correctamente');
			} catch (QueryException $e) {
				Session::flash('error', 'Ha ocurrido un error ' . $e);
				DB::rollback();
			}
			DB::commit();
			return redirect($route);
		}
	}


	function detventaplan()
	{
		$pagadostatus = array('N','S','P');
		$cantidadPagada = $r->cantidadPagada;
		$folio = explode("-", $r->folio)[1];
		DB::beginTransaction();
		try {
			$alumnocxc = Alumnocxc::find($r->alumnocxc_id);

			if ($alumnocxc->cantidadPagada == null) {
				if ($cantidadPagada < $alumnocxc->cantidadProgramada) {
					$alumnocxc->pagado = $pagadostatus[2];
					$alumnocxc->cantidadPagada = $cantidadPagada;
				}else{
					$alumnocxc->pagado = $pagadostatus[1];
					$alumnocxc->cantidadPagada = $alumnocxc->cantidadProgramada;
				}
			}else{
				if (intval($cantidadPagada) + intval($alumnocxc->cantidadPagada) >= $alumnocxc->cantidadProgramada) {
					$alumnocxc->pagado = $pagadostatus[1];
					$folio = $alumnocxc->productos[0]->pivot->reciboCaja;
					$alumnocxc->cantidadPagada = $alumnocxc->cantidadProgramada;
				}else{
					$alumnocxc->pagado = $pagadostatus[2];
					$alumnocxc->cantidadPagada = $r->cantidadPagada;
					$folio = $alumnocxc->productos[0]->pivot->reciboCaja;
				}
			}
			$pagoDetail = array('fechaPago' => $r->fecha, 'caja_id' => $r->caja_id, 'reciboCaja' => $folio, 'recibidoPor' => Auth::user()->name);
			$ids = $alumnocxc->productos()->allRelatedIds();
			foreach ($ids as $id) {
				$alumnocxc->productos()->updateExistingPivot($id,$pagoDetail);
			}
			$alumnocxc->save();
			Session::flash('success', 'El registro se ha realizado con éxito');
		} catch (PDOException $e) {
			Session::flash('error', "Ha ocurrido un error ". $e);
			DB::rollback();
		}
		DB::commit();

		return redirect("/admin/cobranza");
	}
}


?>