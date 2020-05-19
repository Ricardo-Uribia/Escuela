<?php

namespace App\Http\Controllers\Backend\Cobranza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Internal\CRUDControllersInterface; 
use App\Models\Cobranza\Concepto;
use App\Models\Cobranza\Cuenta;
use Illuminate\Support\Facades\Session;
use App\Models\Cobranza\Producto;
use Illuminate\Database\QueryException;
use DB;

class ConceptosPagoController extends Controller implements CRUDControllersInterface
{
    //GET
    public function index(){

        $conceptos = Concepto::paginate(10);
        return view('Backend/Cobranza/Cuentas_pagos/index')->with('conceptos',$conceptos);
    }

    //GET 
    public function details(Request $r){}

    //GET
    public function show(){}

    //GET
    public function createForm(){
        $cuentas = Cuenta::select('codigo', 'id')->get();
        return view('Backend/Cobranza/Cuentas_pagos/Formularios/create')->with('cuentas', $cuentas);
    }

    //POST
    public function create(Request $r){
        DB::beginTransaction();
        try {
            $producto = new Producto();
            $producto->codigo = $r->codigo;
            $producto->descripcion = $r->descripcion;
            $producto->tipo = "CN";
            $producto->precio = $r->precio;

            $concepto = new Concepto();
            $concepto->impuesto = $r->impuesto;
            $concepto->cuenta_id = $r->cuenta_id;
            $concepto->save();
            $producto->tipo_id = $concepto->id;
            $producto->save(); 
            Session::flash('success','El registro se ha guardado con éxito');
        } catch (QueryException $e) {
            DB::rollback();
            Session::flash('error','Ha ocurrido un error, intentelo más tarde o llame al administrador');
        }
        DB::commit();
        return redirect('admin/conceptos/cobro');
    }

    //GET
    public function updateForm(Request $r){
        $conceptos = Concepto::find($r->concepto_id);
        $cuentas = Cuenta::select('codigo', 'id')->get();
        return view('Backend/Cobranza/Cuentas_pagos/Formularios/update')->with(['conceptos' => $conceptos, 'cuentas' => $cuentas]);
    }

    //POST
    public function update(Request $r){
        $this->validate($r,[
            'codigo' => 'required|min:3|max:10',
            'precio' => 'required',
            'cuenta_id' => 'required', 
            'impuesto' => 'required',
            'descripcion' => 'max:50|min:5'
        ]);

        DB::beginTransaction();
        try {
            $concepto = Concepto::find($r->concepto_id);
            $concepto->impuesto = $r->impuesto;
            $concepto->cuenta_id = $r->cuenta_id;
            $concepto->save();

            $producto = Producto::where('tipo_id', $concepto->id)->first();
            $producto->codigo = $r->codigo;
            $producto->descripcion = $r->descripcion;
            $producto->tipo = "CN";
            $producto->precio = $r->precio;
            $producto->tipo_id = $concepto->id;
            $producto->save(); 
            Session::flash('success','Registro actualizado con éxito');
        } catch (PDOException $e) {
            DB::rollback();
            Session::flash('error','Ha ocurrido un error, intentelo más tarde o llame al administrador');
        }
        DB::commit();

        return redirect('admin/conceptos/cobro');
    }  

    //POST JSON
    public function fetch(){}

    //POST
    public function delete(Request $r){}

    //POST
    public function destroy($id)
    {
        $concepto = Concepto::find($id);
        $producto = Producto::where('tipo_id',$concepto->id);
        $producto->delete();
        $concepto->delete();
    }
}
