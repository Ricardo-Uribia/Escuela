<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Vinculacion\Nivel;
use App\Models\Configuracion\Carrera;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\QueryException;

class NivelesController extends Controller
{
    public function index()
    {   
        $carreras = Carrera::paginate(10);
        return view("Backend.Configuracion.Niveles.index")->with("carreras", $carreras);
    }

    public function createForm()
    {
        $niveles = Nivel::select('id','identificador')->get();
        return view("Backend.Configuracion.Niveles.Formularios.create")->with("niveles", $niveles);
    }

    public function createNivel(Request $r)
    {
        try {
            $nivel = new Nivel;
            $nivel->identificador=$r->clave;
            $nivel->nivel=$r->nivel;
            $nivel->abr_nivel=$r->abr_nivel;
            $nivel->save();
            Session::flash('success', 'Se ha ingresado con éxito');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
            
        }
        return redirect('/admin/niveles/index');
    }

    public function create(Request $r)
    {
        try {
            $nivel = new Carrera;
            $nivel->identificador_carrera = $r->clave;
            $nivel->descripcion=$r->descripcion;
            $nivel->status=$r->status;
            $nivel->nivel_id=$r->nivel_id;
            $nivel->acuerdo_creacion=$r->acuerdo;
            $nivel->fecha=$r->fecha;
            $nivel->fecha_inicio=$r->fechaInicial;
            $nivel->fecha_fin=$r->fechaFinal;
            $nivel->save();
            Session::flash('success', 'Se ha ingresado con éxito');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
        }
        return redirect('/admin/niveles/index');
    }

    public function show($id)
    {
    	
    }

    public function updateForm($id_recived)
    {   
        $id         = Crypt::decrypt($id_recived);
        $carrera    = Carrera::find($id);
        $niveles    = Nivel::all();
        return view("Backend.Configuracion.Niveles.Formularios.update")->with(["carrera" => $carrera, "niveles" => $niveles]);
    }

   public function update(Request $r, $id_recived)
   {    
        $id = Crypt::decrypt($id_recived);
        try {
            $carreras = Carrera::find($id);
            $carreras->identificador_carrera = $r->clave;
            $carreras->descripcion=$r->descripcion;
            $carreras->status=$r->status;
            $carreras->nivel_id=$r->nivel_id;
            $carreras->acuerdo_creacion=$r->acuerdo;
            $carreras->fecha=$r->fecha;
            $carreras->fecha_inicio=$r->fechaInicial;
            $carreras->fecha_fin=$r->fechaFinal;
            $carreras->save();
            Session::flash('success', 'Se ha ingresado con éxito');
        } catch (QueryException $e) {
            Session::flash('error', 'Oupsss... Ha ocurrido un error, '.$e);
        }
        return redirect('/admin/niveles/index');
    	
    }

    public function delete($id_recived)
    {   
        $id = Crypt::decrypt($id_recived);
        $carreras = Carrera::find($id);
        $carreras->forceDelete();
    }
}
