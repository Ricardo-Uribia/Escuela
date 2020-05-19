<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CuentasFormRequest;
use DB;
use Response;

class CuentasController extends Controller
{
    public function __construct()
    {
    	 
    }

    public function index(Request $request){

    	if ($request) 
    	{
    		$query=trim($request->get('searchText'));
    		$cuenta = Cuenta::all();

            if (empty($query)) {
               return view('configuracion.cuenta.index', ["cuenta" => $cuenta, "searchText" => $query]);
            }else{

            return view('configuracion.cuenta.buscado', ["cuenta" => $cuenta, "searchText" => $query]);
           
            }
             
    	}


    }

   

    public function store(CuentasFormRequest $request){

    	$nivel = new Cuenta;
    	$nivel->codigoCuenta=$request->get('codigo');
    	$nivel->descripcion=$request->get('descripcion');
        $nivel->acumulativa=$request->get('acumulativo');
    	$nivel->nivel=$request->get('nivel');
    	
    	$nivel->save();
    	return Redirect::to('configuracion');

    }

    public function show ($id){

    	$nivel=Cuenta::findOrFail($id);
    	$nivel->delete();

    	return Redirect::to('configuracion/cuenta');

    	//return view("configuracion/cuenta/show", ["nivel" => Cuenta::findOrFail($id)]);
    }



    public function edit($id){
        $nivel = Cuenta::findOrFail($id);
    	return view("configuracion/cuenta/edit", ["nivel" => $nivel]);
    }

    public function update(CuentasFormRequest $request, $id){

    	$nivel = Cuenta::findOrFail($id);
    	$nivel->codigoCuenta=$request->get('codigo');
    	$nivel->descripcion=$request->get('descripcion');
        $nivel->acumulativa=$request->get('acumulativo');
    	$nivel->nivel=$request->get('nivel');

    	$nivel->save();
    	return Redirect::to('configuracion/');
    }

    public function destroy($id){


        try{
            $cuenta = Cuenta::findOrFail($id);
        $cuenta->delete();

        return Redirect::to('configuracion/');

        }catch(\Exception $e)
        {
          return Response::view('error.error404', array(), 404);
        }
        
    }
}
