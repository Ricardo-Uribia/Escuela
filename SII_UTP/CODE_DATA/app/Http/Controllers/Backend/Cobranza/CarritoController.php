<?php

namespace App\Http\Controllers\Backend\Cobranza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cobranza\Producto;
use App\Models\Alumnos\Alumno;
use Illuminate\Support\Facades\Session;
use App\Services\Internal\ShoppingCart;
use App\Models\Configuracion\Ciclo;

class CarritoController extends Controller
{
	public function actionShopCart (Request $r)
	{
		$state 				= 	404;
		$message 			= 	'Oupss, ah ocurrido un error, si el problema persiste contactese con el administrador';
		$data_json_decode 	= 	(array) json_decode($r->data, true);
		$product 			= 	Producto::find($data_json_decode[0]['producto_id']);
		$shoolYear			= 	Ciclo::select('id','codigo_corto')
								->where('codigo_corto', $data_json_decode[0]['ciclo'] ? $data_json_decode[0]['ciclo'] : Session::get('ciclos')->codigo_corto)
								->first();
		$student			= 	Alumno::find($data_json_decode[0]['alumno_id']);

		$oldShoppingCart	= 	Session::has('CARRITO_'.$product->tipo) ? Session::get('CARRITO_'.$product->tipo) : null;
		$cart 				= 	ShoppingCart::getInstance($oldShoppingCart);
		 $addProductCart 	= 	$cart->addProductCart($product, $shoolYear, $student);
		if ($addProductCart[0]['state'] != '404'){
			$state 		= 200;
			$message	= 'Producto agregado con éxito';
		}else{
			$state 		= $addProductCart[0]['state'];
			$message	= $addProductCart[0]['message'];
		}
		$r->session()->put('CARRITO'.$cart->product_type, $cart);
		return response()->json(["state" => $state, "message" => $message]);
	}

	public function actionDeleteShopCart($id)
	{
		$product_id 	 = Producto::find($id);
		$oldShoppingCart = Session::has('CARRITO_'.$product_id->tipo) ? Session::get('CARRITO_'.$product_id->tipo) : null;
		$cart 			 = ShoppingCart::getInstance($oldShoppingCart);
		$deleteProduct 	 = $cart->deleteProductCart($product_id->id);
		if(count($cart->products) > 0){
		   Session::put('CARRITO_'.$product_id->tipo, $cart);
		}else{
		   Session::forget('CARRITO_'.$product_id->tipo);
		}
		Session::flash('success', 'Registro eliminado con éxito');
		return redirect()->back();
	}
}


?>