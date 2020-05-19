<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConceptoPago;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests\ConceptoPagosFormRequest;
use DB;

class ConceptosPagoController extends Controller
{
     public function __construct()
    {
         
    }

    public function index(Request $request){
    if ($request) 
        {
            $query=trim($request->get('searchText'));
            $concepto = DB::table('conceptopago as cp')
            ->join('catcuentas as cc', 'cp.idCuenta', '=', 'cc.idCatCuentas')
            ->select('cp.idConceptosPagos', 'cp.codigoConcepto', 'cp.descripcion', 'cp.precio', 'cp.impuesto', 'cc.codigoCuenta', 'cc.nivel')
            ->where('cp.descripcion', 'LIKE', '%'. $query . '%')
            ->orwhere('cc.codigoCuenta', 'LIKE', '%'. $query . '%')
            ->orwhere('cp.codigoConcepto', 'LIKE', '%'. $query . '%')
            ->orderBy('cp.idConceptosPagos', 'desc')
            ->paginate(7);

            return view('admin.cobranza.conceptosPago.index', ["concepto" => $concepto, "searchText" => $query]);
        }
    }

    public function create(){

        $cuenta= DB::table('catcuentas as cc')
        ->select(DB::raw('CONCAT("Cuenta: " , cc.codigoCuenta, " " ,"Nivel: " , cc.nivel, " ", cc.descripcion) as cuenta'), 'cc.idCatCuentas')
        ->get();

        return view("admin.cobranza.conceptosPago.create",  ['cuenta' => $cuenta]);
    }

    public function store(Request $request){

        $consepto = new ConceptoPago;
        $consepto->impuesto=$request->get('impuesto');
        $consepto->codigoConcepto=$request->get('codigoConcepto');
        $consepto->descripcion=$request->get('descripcion');
        $consepto->precio=$request->get('precio');
        if ($request->get('idCuenta') == 0) {
           
           $consepto->idCuenta=null;
        }else{

        $consepto->idCuenta=$request->get('idCuenta');

        }

        $consepto->save();
        return Redirect::to('utp/conceptosPago');

    }

    public function show ($id){

        return view("admin.cobranza.conceptosPago/show", ["concepto" => ConceptoPago::findOrFail($id)]);
    }

   

    public function edit($id){

        $concepto=ConceptoPago::findOrFail($id);
        $cuenta= DB::table('catcuentas as cc')
        ->select(DB::raw('CONCAT("Cuenta: " , cc.codigoCuenta, " " ,"Nivel: " , cc.nivel, " ", cc.descripcion) as cuenta'), 'cc.idCatCuentas')
        ->get();       

        return view("admin.cobranza.conceptosPago.edit", ["concepto" => $concepto, "cuenta" => $cuenta]);
    }

    public function update(Request $request, $id){

        $consepto = ConceptoPago::findOrFail($id);
        $consepto->codigoConcepto=$request->get('codigoConcepto');
        $consepto->descripcion=$request->get('descripcion');
        $consepto->precio=$request->get('precio');
        $consepto->idCuenta=$request->get('idCuenta');

        $consepto->save();
        return Redirect::to('utp/conceptosPago');
    }

    public function destroy($id){

        $consepto=ConceptoPago::findOrFail($id);
        $consepto->delete();

        return Redirect::to('utp/conceptosPago');

    }
}
