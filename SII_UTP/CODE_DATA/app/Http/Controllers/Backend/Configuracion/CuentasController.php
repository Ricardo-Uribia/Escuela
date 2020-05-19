<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cobranza\Cuenta;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;


class CuentasController extends Controller
{
    public function index()
    {
        $cuentas = Cuenta::paginate(10);
        return view('Backend.Configuracion.Cuentas.index')->with("cuentas", $cuentas);
    }

    public function createForm()
    {
        return view("Backend.Configuracion.Cuentas.Formularios.create");
    }

    public function create(Request $r)
    {
        try {
        	$caja = new Cuenta;
        	$caja->codigo=$r->codigo;
        	$caja->descripcion=$r->descripcion;
        	$caja->nivel=$r->nivel;
        	$caja->acumulativa=$r->acumulativa;
        	$caja->save();
            Session::flash('success', 'Se ha agregado con éxito');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '. $e);
        }
    	return redirect('/admin/cuentas/index');
    }

    public function show($id)
    {
    	
    }

    public function updateForm($id_recived)
    {   
        $id = Crypt::decrypt($id_recived);
        $cuenta = Cuenta::find($id);
    
    	return view("Backend.Configuracion.Cuentas.Formularios.update")->with("cuenta",$cuenta);
    }

   public function update(Request $r, $id_recived)
   {
        try {
            $id = Crypt::decrypt($id_recived);
            $caja = Cuenta::find($id);
            $caja->codigo=$r->codigo;
            $caja->descripcion=$r->descripcion;
            $caja->nivel=$r->nivel;
            $caja->acumulativa=$r->acumulativa;
            $caja->save();
            Session::flash('success', 'Se ha actualizado con éxito');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
        }   

        return redirect('/admin/cuentas/index');
    	
    }

    public function delete($id_recived)
    {
        $id = Crypt::decrypt($id_recived);
        $cuenta = Cuenta::find($id);
        $cuenta->forceDelete();
    }
}
