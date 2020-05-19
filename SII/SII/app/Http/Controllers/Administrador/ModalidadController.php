<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Models\Modalidad;
use App\Models\Niveles;
use DB;

class ModalidadController extends Controller
{
     public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$modalidad = DB::table('modalidads as mod')
            ->join('niveles as niv', 'mod.niveles_id', '=', 'niv.id')
    		->select('mod.id', 'mod.description', 'mod.codigoMod', 'mod.nombreDoctoRecept',  'niv.Identificador')
    		->orderBy('mod.id', 'desc')
    		->get();

            if (\Session::get('ciclos')) {
               $ciclo = \Session::get('ciclos');

            }
            return view('admin.modalidad.index', ["modalidad" => $modalidad, "searchText" => $query]);
    		
    	}
    }

    public function create()
    {
    	$niveles = Niveles::all();

       
    	return view('admin.modalidad.create', ['niveles' => $niveles]);
    }

    public function store(Request $request)
    {

        if ($request->file('nombreDoctoRecept')) {

            $file= $request->file('nombreDoctoRecept');
            $name = 'nombreDoctoRecept' .time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\doctoTitul';
            $file->move($path, $name);
           
        } else {

            $name = "";
        }

    	$mod = new Modalidad;
    	$mod->codigoMod=$request->get('codigoMod');
    	$mod->description=$request->get('description');
    	$mod->nombreDoctoRecept=$name;
    	$mod->carreras_id=$request->get('niveles_id');
    	$mod->save();
    	return Redirect::to('configurar/modalidades');
    }

    public function show()
    {
    	
    }

    public function edit($id)
    {
    	$modalidad =Modalidad::findOrFail($id);
    	$niveles = $modalidad->carreras_id;
    	$niv=DB::table('niveles')
    	->select('id', 'nombreNivel', 'Identificador')
    	->where('id', '=', $niveles)
    	->get();

    	return view("admin.modalidad.edit", ["modalidad" => $modalidad, 'niv' => $niv]);
    }

   public function update(Request $request, $id){


         if ($request->file('nombreDoctoRecept')) {

            $file= $request->file('nombreDoctoRecept');
            $name = 'nombreDoctoRecept' .time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\doctoTitul';
            $file->move($path, $name);
           
        } else {

            $name = "";
        }
       
    	$mod = Modalidad::findOrFail($id);
    	$mod->codigoMod=$request->get('codigoMod');
    	$mod->description=$request->get('description');
    	$mod->nombreDoctoRecept=$name;
    	$mod->carreras_id=$request->get('niveles_id');
    	$mod->update();
    	return Redirect::to('configurar/modalidades');
    }

    public function destroy($id){

    	$mod=Modalidad::findOrFail($id);
    	$mod->delete();

    	return Redirect::to('configurar/modalidades');

    }
}
