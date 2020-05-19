<?php

namespace App\Http\Controllers\Backend\Cobranza;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Internal\CRUDControllersInterface; 
use App\Models\Cobranza\Concepto;
use App\Models\Cobranza\Cuenta;
use Illuminate\Support\Facades\Session;
use App\Models\Cobranza\Planpago;
use App\Models\Cobranza\Alumnocxc;
use Illuminate\Support\Facades\Crypt;
use App\Models\Configuracion\Ciclo;
use DB;
use Illuminate\Database\QueryException;
use App\Models\Cobranza\Producto;

class PlanesPagoController extends Controller implements CRUDControllersInterface
{
    //GET
    public function index(){
        if (Session::has('ciclos')) {
            $planespago = Planpago::where('ciclo_id',Session::get('ciclos')->id)->paginate(10);
            

            if (count($planespago)==0) {
                Session::flash('error', 'Sin planes en el periodo seleccionado');
            }
        }else{
            $planespago = Planpago::paginate(10);
        }
        return view('Backend/Cobranza/Planes_pagos/index')->with('planespago' , $planespago);
    }

    //GET 
    public function details(Request $r){
        $planpago = Planpago::find($r->planId);
        return view('Backend/Cobranza/Planes_pagos/details')->with('planpago',$planpago);
    }

    //GET
    public function show(){}

    //GET
    public function createForm(){
      /*  $cuentas = Cuenta::select('codigo', 'id')->get();
        return view('Backend/Cobranza/Cuentas_pagos/Formularios/create')->with('cuentas', $cuentas);*/
    }

    //POST
    public function create(Request $r){
        DB::beginTransaction();
        try {
            $planesPagoMst = new Producto();
            $planesPagoMst->codigo = $r->codigo;
            $planesPagoMst->descripcion = $r->descripcion;
            $planesPagoMst->tipo = "PL";

            $planpago = new Planpago();
            $planpago->ciclo_id = Session::get('ciclos')->id;
            $planpago->save();
            $planesPagoMst->tipo_id = $planpago->id;
            $planesPagoMst->save();
            Session::flash('mensaje', 'Para continuar es necesario que ingreses los datos faltantes');
        } catch (PDOException $e) {
            DB::rollback();
        }
        DB::commit();
       
        return redirect('/admin/configuracion/planpago');
    }

    //GET
    public function updateForm(Request $r){
        $conceptos = Producto::where('tipo','CN')->get();
        $ciclos = Ciclo::select('id', 'descripcion')->get();
        $planpago = Planpago::find($r->plan_id);
        return view('Backend/Cobranza/Planes_pagos/Formularios/edit')->with(['planpago'=> $planpago, 'conceptos' => $conceptos, 'ciclos' => $ciclos]);
    }

    public function edit(Request $r){

        DB::beginTransaction();
        try {
            $producto = Producto::find($r->planpago);
            $producto->codigo = $r->codigo;
            $producto->descripcion = $r->descripcion;
            $producto->precio = $r->precio;
            $producto->tipo = "PL";

            $planpago = Planpago::find($producto->tipo_id); 
            $planpago->aniocorrespondiente = $r->aniocorresponde;
            $planpago->conceptopago_id = Producto::find($r->concepto_id)->conceptopago->id;
            $planpago->mes = $r->mes;
            $planpago->fechaInicio = $r->fechaInicio;
            $planpago->fechaFin = $r->fechaFin;
            $planpago->save();
            $producto->save();

            Session::flash('success', 'Registro guardado con éxito');

        } catch (QueryException $e) {
            Session::flash('error', 'Ha ocurrido un error, intente mas tarde o llame al administrador'. $e);
            DB::rollback();
        }
        DB::commit();
        return redirect('/admin/planes/pago');
    }

    //POST
    public function update(Request $r){

        
        DB::beginTransaction();
        try {
            $producto = Producto::find($r->planpago); 
            $producto->precio = $r->precio;
            $producto->save();
            $planpago = Planpago::find($producto->tipo_id);
            $planpago->aniocorrespondiente = $r->aniocorresponde;
            $planpago->ciclo_id = Session::get('ciclos')->id;
            $planpago->conceptopago_id = $r->concepto_id;
            $planpago->mes = $r->mes;
            $planpago->fechaInicio = $r->fechaInicio;
            $planpago->fechaFin = $r->fechaFin;
            $planpago->save();
            Session::flash('mensaje', 'Para continuar es necesario que ingreses los datos faltantes');
        } catch (QueryException $e) {
            Session::flash('error', 'Ha ocurrido un error, intenta más tarde o llame al administrador');
            DB::rollback();
        }
        DB::commit();

        return redirect('admin/planes/pago');
    }  

    //POST JSON
    public function fetch(){}

    //POST
    public function delete(Request $r){}

    //POST
    public function destroy($id_recived)
    {
        $id =  Crypt::decrypt($id_recived);
        $plan = Planpago::find($id);
        $producto = Producto::where('tipo_id',$plan->id)->first();

        if (count($producto->alumnocxcs)>0) {
            return false;
        }else{
            $plan->delete();
            $producto->delete();
        }
       
    }

    public function registerContinue(){
        $conceptos = Concepto::select('id')->get();
        $planpago = Producto::all()->last();
        return view('Backend/Cobranza/Planes_pagos/Formularios/update')->with(['planpago'=> $planpago, 'conceptos' => $conceptos]);
        
    }
}