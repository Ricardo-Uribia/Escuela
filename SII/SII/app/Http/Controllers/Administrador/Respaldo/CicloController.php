<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciclo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CicloFormRequest;
use DB;
use DateTime;

class CicloController extends Controller
{
   public function __construct()
    {
    	   
    }

    public function index(Request $request){

    	if ($request) 
    	{
    		$query=trim($request->get('searchText'));
    		$ciclos = DB::table('ciclo')
    		->orwhere('descripcion', 'LIKE', '%'. $query . '%')
    		->orwhere('codigoCorto', 'LIKE', '%'. $query . '%')
    		->orderBy('idCiclo', 'desc')
    		->paginate(7);

            if (empty($query)) {
                return view('configuracion.ciclos.index', ["ciclos" => $ciclos, "searchText" => $query]);
            }else{

            return view('configuracion.ciclos.buscado', ["ciclos" => $ciclos, "searchText" => $query]);
           
            }

    		

    	}
    }

    public function create(){

    	return view("configuracion.ciclos.create");
    }

    public function store(CicloFormRequest $request){

        $ultimo = DB::table('ciclo')
            ->select('idCiclo','fechaFinal', 'periodo')
            ->orderBy('idCiclo', 'desc')
            ->limit(1)
            ->get();

        $existencia = DB::table('ciclo')
        ->get();


        if(count($existencia)>=1){

        $validarFecha = $ultimo[0]->fechaFinal;
        $hoy = new DateTime();
        $fechaFin = new DateTime($validarFecha); 
        $validarPeriodo=$request->get('periodo');


        while ($validarPeriodo <= 3) {
                $validarFecha = $ultimo[0]->fechaFinal;
                $hoy = new DateTime();
                $fechaFin = new DateTime($validarFecha); 
                if($fechaFin <=  $hoy){

                    $ciclos = new Ciclo;
                    $ciclos->inicial=$request->get('inicial');
                    $ciclos->final=$request->get('final');
                    $ciclos->periodo =$request->get('periodo');
                    $ciclos->descripcion=$request->get('descripcion');
                    $ciclos->codigoCorto=$request->get('codigoCorto');
                    $ciclos->fechaInicial=$request->get('fechaInicial');
                    $ciclos->fechaFinal=$request->get('fechaFinal');
                    $ciclos->save();
                }else{

                    return "<script>var confirmar = confirm('Espera a que Termine el Ciclo Actual Para Crear Uno Nuevo O Cambia el periodo que no sea menor o igual a 3');if (confirmar == true) {location.href ='../configuracion';}</script>";
                }
            }

            $ciclos = new Ciclo;
            $ciclos->inicial=$request->get('inicial');
            $ciclos->final=$request->get('final');
            $ciclos->periodo =$request->get('periodo');
            $ciclos->descripcion=$request->get('descripcion');
            $ciclos->codigoCorto=$request->get('codigoCorto');
            $ciclos->fechaInicial=$request->get('fechaInicial');
            $ciclos->fechaFinal=$request->get('fechaFinal');
            $ciclos->save();

            return Redirect::to('configuracion');
           
        }else{
       
            $ciclos = new Ciclo;
            $ciclos->inicial=$request->get('inicial');
            $ciclos->final=$request->get('final');
            $ciclos->periodo =$request->get('periodo');
            $ciclos->descripcion=$request->get('descripcion');
            $ciclos->codigoCorto=$request->get('codigoCorto');
            $ciclos->fechaInicial=$request->get('fechaInicial');
            $ciclos->fechaFinal=$request->get('fechaFinal');
            $ciclos->save();

            return Redirect::to('configuracion');
    }

    }

    public function show ($id){

    	return view("configuracion/ciclos/show", ["ciclos" => Ciclo::findOrFail($id)]);
    }

    public function edit($id){

        $ciclo = Ciclo::findOrFail($id);
    	return view("configuracion/ciclos/edit", ["ciclos" => $ciclo]);
    }

    public function update(CicloFormRequest $request, $id){

    	$ciclos = Ciclo::findOrFail($id);
    	$ciclos->inicial=$request->get('inicial');
    	$ciclos->final=$request->get('final');
    	$ciclos->periodo =$request->get('periodo');
    	$ciclos->descripcion=$request->get('descripcion');
    	$ciclos->codigoCorto=$request->get('codigoCorto');
    	$ciclos->fechaInicial=$request->get('fechaInicial');
    	$ciclos->fechaFinal=$request->get('fechaFinal');
    	$ciclos->save();

    	return Redirect::to('configuracion');
    }

    public function destroy($id){

    	$ciclos=ciclo::findOrFail($id);
    	$ciclos->delete();

    	return Redirect::to('configuracion');

    }
}
