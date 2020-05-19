<?php
namespace App\Http\Controllers\Backend\Alumnos;

use App\Http\Controllers\Controller;
use App\Models\Alumnos\Grupo;
use App\Models\Alumnos\Alumno;
use App\Models\Vinculacion\Nivel;
use App\Models\Configuracion\Carrera;
use App\Models\Empleados\Profesores\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Configuracion\Ciclo;
use App\Services\Internal\CRUDControllersInterface;
use Illuminate\Support\Facades\Crypt;

class GruposController extends Controller implements CRUDControllersInterface
{    
    //GET
    public function index()
    {
        $grupos = $this->getGrupos();            
        return view('Backend.Alumnos.Grupos.index', ['grupos' => $grupos]);
    }

    //GET
    public function createForm(){
        $profesores = Profesor::all();                        
        $niveles    = Nivel::all();
        
        return view('Backend.Alumnos.Grupos.Formularios.create', ['profesores' => $profesores, 'niveles' => $niveles  ]);
    }

    //GET
    public function getCarrerasFromNivel(Request $r){                 
        
        $carreras = Carrera::where('nivel_id', $r->nivel_id)->get();
        $state    = 404;
        $data     = 'No se encontraron carreras registradas con el nivel seleccionado, en nuestros registros.';

        if ($carreras != null && $carreras != '[]'){
            $state = 200;
            $data = $carreras;            
        }

        return response()->json(['state' => $state, 'data' => $data ]);
    }

    //POST
    public function create(Request $r){
        $request             = $r->except(['_token','nivel_id']); 
        $request['ciclo_id'] = Session::get('ciclos')->id;
        $grupo               = Grupo::create($request);          

        if ($grupo->created_at != null) {            
            Session::flash('success', 'El grupo ha sido registrado exitosamente.');
            return redirect('/admin/grupos');
        }else{
            Session::flash('error', 'El grupo no pudo ser registrado. Porfavor vuelva a intentar.');
            return back();
        }
    }

    //GET
    private function getGrupos(){
        if (Session::has('ciclos')) {     
            return Grupo::where('ciclo_id', Session::get('ciclos')->id)->get();
        }else{
            return Grupo::all();    
        }
    }

        
    //POST
    public function details(Request $r){}

    public function detailsPublicView($args){
        $decrypt = Crypt::decrypt($args);  
        $explode = explode("_", $decrypt);
        $caracters = $explode[0];
        $grupo_id  = $explode[1];

        if ($caracters === "?¡'a3a" && is_numeric($grupo_id)) {
            //autorizado
            $grupo   = Grupo::find($grupo_id);
            if ($grupo != '') {                             
               $alumnos = $grupo->alumnos()->paginate(10);
               return view('Backend.Alumnos.Grupos.details', ['grupo' => $grupo, 'alumnos' => $alumnos]);
            }
        }
        Session::flash('error', 'El grupo no pudo ser encontrado. Porfavor vuelva a intentar.');
        return back();
    }

    //GET
    public function show(){}

    //GET
    public function updateForm(Request $r){
        $grupo      = Grupo::find($r->grupo_id);
        $profesores = Profesor::all();                        
        $niveles    = Nivel::all();
        
        return view('Backend.Alumnos.Grupos.Formularios.update', ['profesores' => $profesores, 'niveles' => $niveles, 'grupo' => $grupo  ]);
    }

    //POST
    public function update(Request $r){
        $request = $r->except(['_token','nivel_id','grupo_id']);                 
        $updated = Grupo::find($r->grupo_id)->update($request);        

        if ($updated) {            
            Session::flash('success', 'El grupo ha sido actualizado exitosamente.');
            return redirect('/admin/grupos');
        }else{
            Session::flash('error', 'El grupo no pudo ser actualizado. Porfavor vuelva a intentar.');
            return back();
        }
    }  

    //POST JSON
    public function fetch(){}

    //POST
    public function delete(Request $r){}

    //POST
    public function destroy($id){
    }

}
