<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cobranza\Caja;
use App\Models\Cobranza\Cuenta;
use App\Models\Empleados\Empleado;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;


class CajasController extends Controller
{
    public function index()
    {
        $cajas = Caja::paginate(10);
        return view('Backend.Configuracion.Cajas.index')->with("cajas", $cajas);
    }

    public function createForm()
    {
        $cuentas = Cuenta::all();
        $emplados = Empleado::all();
        return view("Backend.Configuracion.Cajas.Formularios.create")->with(["cuentas" => $cuentas, "emplados" => $emplados]);
    }

    public function create(Request $r)
    {
        try {
        	$caja = new Caja;
        	$caja->empleado_id=$r->userAsig;
        	$caja->descripcion=$r->descripcion;
        	$caja->consecutivo=$r->consecutivo;
        	$caja->status=$r->estatus;
            $caja->cuenta_id=$r->cuenta;
        	$caja->save();
            Session::flash('success', 'Se ha insertado correctamente');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
             return $this->createForm();
        }
    	return redirect('/admin/cajas/index');
    }
 
    public function show($id)
    {
    	
    }

    public function updateForm($id_recived)
    {
        $id = Crypt::decrypt($id_recived);
        $caja = Caja::find($id);
    	$cuentas = Cuenta::all();
        $emplados = Empleado::all();
        return view("Backend.Configuracion.Cajas.Formularios.update")->with(["cuentas" => $cuentas, "emplados" => $emplados, "caja" => $caja]);
    }

   public function update(Request $r, $id_recived)
   {
        $id = Crypt::decrypt($id_recived);
        try {
            $caja = Caja::find($id);
            $caja->empleado_id=$r->userAsig;
            $caja->descripcion=$r->descripcion;
            $caja->consecutivo=$r->consecutivo;
            $caja->status=$r->estatus;
            $caja->cuenta_id=$r->cuenta;
            $caja->save();
            Session::flash('success', 'Se ha actualizado correctamente');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '. $e);
            return $this->updateForm($id_recived);
        }
        return redirect('admin/cajas/index');	
    }

    public function delete($id_recived)
    {   
        $id = Crypt::decrypt($id_recived);
        $caja = Caja::find($id);
        $caja->forceDelete();
    }
}
