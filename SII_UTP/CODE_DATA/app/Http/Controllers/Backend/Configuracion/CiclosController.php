<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Configuracion\Ciclo;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;

class CiclosController extends Controller
{
   public function __construct()
    {
    	   
    }

    public function index()
    {
        $ciclos = Ciclo::paginate(10);
        return view('Backend.Configuracion.Ciclos.index')->with("ciclos",$ciclos);
    }

    public function createForm(){

    	return view("Backend.Configuracion.Ciclos.Formularios.create");
    }

    public function create(Request $r)
    {
        try {
            $ciclos = new Ciclo;
            $ciclos->inicia=$r->inicial;
            $ciclos->finaliza=$r->final;
            $ciclos->periodo =$r->periodo;
            $ciclos->descripcion=$r->descripcion;
            $ciclos->codigo_corto=$r->codigoCorto;
            $ciclos->fecha_inicial=$r->fechaInicial;
            $ciclos->fecha_fin=$r->fechaFinal;
            $ciclos->save();
            Session::flash('success', 'Se ha registrado correctamente');
        } catch(QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
        }
        return redirect('/admin/ciclos/index');
    }

    public function show ($id){

    
    }

    public function updateForm($id_recived){
        $id = Crypt::decrypt($id_recived);
        $ciclo = Ciclo::find($id);
        return view("Backend.Configuracion.Ciclos.Formularios.update")->with("ciclo",$ciclo);
    }

    public function update(Request $r, $id)
    {
        $id = Crypt::decrypt($id);
        try {
            $ciclos = Ciclo::find($id);
            $ciclos->inicia=$r->inicial;
            $ciclos->finaliza=$r->final;
            $ciclos->periodo =$r->periodo;
            $ciclos->descripcion=$r->descripcion;
            $ciclos->codigo_corto=$r->codigoCorto;
            $ciclos->fecha_inicial=$r->fechaInicial;
            $ciclos->fecha_fin=$r->fechaFinal;
            $ciclos->save();
            Session::flash('success', 'Se ha actualizado correctamente');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '. $e);
        }
        return redirect('/admin/ciclos/index');
    }

    public function delete($id_recived){
        $id = Crypt::decrypt($id_recived);
        $ciclo = Ciclo::find($id);
        $ciclo->forceDelete();
    }

    public function keepCiclo($id){

        $ciclo = Ciclo::find($id);

        if (Session::has('ciclos')) {        
            Session::forget('ciclos');
            Session::put('ciclos', $ciclo);
            return response()->json(array('mensaje' => 'Se actualizo el ciclo en sesion', 'ciclo' => Session::get('ciclos')->descripcion));
        }else{
            Session::put('ciclos', $ciclo);
            return response()->json(array('mensaje' => 'No habia y se creo', 'ciclo'  => Session::get('ciclos')->descripcion));
        }
    }

    //POST
    public function fetch(){
        if (Session::has('ciclos')) { 
            $ciclos = Ciclo::where('id', '!=', Session::get('ciclos')->id)->get();
            if ($ciclos != null) {
                return $ciclos;
            }

        }else{
            return  Ciclo::all();
        }
    }

}
