<?php

namespace App\Services\Internal;

class ShoppingCart
{
	public $totalQuantity 	= 0;
	public $totalPrice		= 0;
	public $product_type 	= "";
	public $products		= null;


	public static function getInstance($oldShoppingCart){
		$instance = null;
		if ($instance === null) {
			return new ShoppingCart($oldShoppingCart);
		}
		return $instance;
	}


	private function __construct($oldShoppingCart)
	{
		if ($oldShoppingCart) {
			$this->totalQuantity 	= $oldShoppingCart->totalQuantity;
			$this->totalPrice		= $oldShoppingCart->totalPrice;
			$this->products			= $oldShoppingCart->products;
			$this->product_type 	= $oldShoppingCart->product_type;
		}
	}

	function addProductCart($product, $shoolYear, $student){
		$item = [
			'quantity'	 	=>  0,
			'price' 	 	=> $product->precio,
			'student'	 	=> $student->getNombreCompleto(),
			'student_id' 	=> $student->id,
			'cycleYear_id'	=> $shoolYear->id,
			'cycleYear'	 	=> $shoolYear->codigo_corto,
			'products'	 	=> $product
		];
		;

		if (!empty($this->products)) {
			if (array_key_exists($product->id, $this->products)) {
				$product_new		=	$product->codigo;
				$product_exist		=	$this->products[$product->id]['products']->codigo;
				$product_type_exist =	$this->products[$product->id]['products']->tipo;
				$product_type_new	= 	$product->tipo;
				$student_exist		= 	$this->products[$product->id]['student_id'];

				if ($product->tipo != 'CN') {
					if ($product_new == $product_exist && $product_type_new == $product_type_exist) {
						return array(['state' => 404, 'message' => 'Este plan ya ha sido agregado']);
					}
				}	

				if ($student_exist != $student->id) {
					return array(['state' => 404, 'message' => 'El alumno seleccionado no coincide con el usario previo']);	
				}	
					
				$item = $this->products[$product->id];
			}else{
					

				foreach ($this->products as $key => $producte) {
					if ($producte['products']->tipo != $product->tipo) {
						return array(['state' => 404, 'message' => 'Ya tiene anexado productos, que no son del mismo tipo']);
					}
				}
			}
		}

		

		$item['quantity']++;
		$item['price'] 					= $item['quantity'] * $product->precio;
		$this->products[$product->id] 	= $item;
		$this->totalQuantity++;
		$this->totalPrice 				+= $product->precio;
		$this->product_type 			= "_".$product->tipo;
		return true;
	}

	function deleteProductCart($product_id){
		$this->totalQuantity -= $this->products[$product_id]['quantity'];
        $this->totalPrice -= $this->products[$product_id]['price'];
        unset($this->products[$product_id]);
	}
}

?>