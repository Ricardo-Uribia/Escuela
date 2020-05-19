<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Models\Empleado;
use App\Models\Caja;

class CajaController extends Controller
{
    public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$cajas = DB::table('caja as c')
            ->join('catcuentas as cc', 'c.id', '=', 'cc.idCatCuentas')
    		->select('c.id', 'c.descripcion', 'c.consecutivo', 'cc.descripcion as cuenta', 'c.status', 'c.empleado_id')
            ->where('c.descripcion', 'LIKE', '%'. $query . '%')
            ->orwhere('cc.descripcion', 'LIKE', '%'. $query .'%')
    		->orderBy('c.id', 'desc')
    		->paginate(7);


            if (empty($query)) {
                return view('configuracion.cajas.index',["searchText" => $query, "cajas" => $cajas]);
            }else{

            return view('configuracion.cajas.buscado', ["cajas" => $cajas, "searchText" => $query]);
           
            }

    		
    	}
    }

    public function create()
    {
        $cuenta = DB::table('catcuentas')
        ->select('idCatCuentas', 'codigoCuenta', 'descripcion')
        ->get();

        $users=DB::table('empleados')
        ->select('id', 'NombreEmpleado')
        ->where('tipo', '=', '6')
        ->get();

    	return view('configuracion.cajas.create', ["cuenta" => $cuenta, 'users' => $users]);
    }

    public function store(Request $request)
    {
    	$caja = new Caja;
    	$caja->empleado_id=$request->get('username');
    	$caja->descripcion=$request->get('descripcion');
    	$caja->consecutivo=$request->get('consecutivo');
    	$caja->status=$request->get('status');
        $caja->cuenta_id=$request->get('idCuenta');
    	$caja->save();

    	return Redirect::to('configuracion');
    }

    public function show()
    {
    	
    }

    public function edit($id)
    {
    	$caja =Caja::findOrFail($id);

    	$empleados =DB::table('empleados')
    	->select('id', 'NombreEmpleado')
    	->where('tipo', '=', '6')
    	->get();

    	return view("configuracion.cajas.edit", ["caja" => $caja, "empleados" => $empleados]);
    }

   public function update(Request $request, $id){
       
    	$caja = Caja::findOrFail($id);
    	$caja->empleado_id=$request->get('username');
    	$caja->descripcion=$request->get('descripcion');
    	$caja->consecutivo=$request->get('consecutivo');
        $caja->status=$request->get('status');
        $caja->cuenta_id=$request->get('idCuenta');
    	
    	$caja->update();
    	return Redirect::to('configuracion');
    }

    public function destroy($id){

    	$caja=Caja::findOrFail($id);
    	$caja->delete();

    	return Redirect::to('configuracion');

    }
}
