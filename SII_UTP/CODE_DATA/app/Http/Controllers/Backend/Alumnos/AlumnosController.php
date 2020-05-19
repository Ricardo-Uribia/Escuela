<?php

namespace App\Http\Controllers\Backend\Alumnos;

use App\Http\Controllers\Controller;
use App\Models\Alumnos\Alumno;
use App\Models\Configuracion\ActividadTrabajo;
use App\Models\Configuracion\Cfgstatus;
use App\Models\Configuracion\Escolaridad;
use App\Models\Configuracion\Estado;
use App\Models\Vinculacion\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Services\Internal\StaticArrays as SysArr;
use App\Models\Configuracion\Carrera;
use App\Models\Alumnos\Grupo;
use App\Models\Alumnos\FolioAlumno;
use App\Services\DB\DBDev;
use App\Services\Internal\DocumentStatements as DSts;
use App\Services\Internal\CRUDControllersInterface;
use DB;

class AlumnosController extends Controller implements CRUDControllersInterface
{
    //GET
    public function index()
    {
        $alumnos = Alumno::paginate(10);        
        return view('Backend.Alumnos.index', ['alumnos' => $alumnos]);
    }

    //GET
    public function details(Request $r)
    {}

    //GET
    public function show()
    {}

    //GET
    public function createForm(){
        return view('Backend.Alumnos.Formularios.create', $this->getCompact());
    }

    //POST
    public function create(Request $r)
    {
                   
        $request = $r->except(['_token','grupo_id','carrera_id','subir_documentos','fotografia']);
        $path    = storage_path().DSts::$PATH_ALUMN_IMG;                
        $nombre_foto;                
        $alumno_creado;
        DB::beginTransaction();
        try {            
            $folio_creado    = DBDev::generarFolio(); 
            $folio_id_creado = (FolioAlumno::select('id','folio')->where('folio',$folio_creado)->first())->id;
            $request['folio_alumno_reg_id']= $folio_id_creado;    
            if ($r->hasFile('fotografia')) {
                $archivo_r     = $r->file('fotografia');    
                $original_name = $r->file('fotografia')->getClientOriginalName();
                $explode       = explode(".", $original_name);
                $extension     = end($explode);
                $nombre_foto  = DSts::$CV_FOTOGRAFIA.DSts::$SFX_ALUM.$folio_creado.".".$extension;
                $request['fotografia'] = $nombre_foto;
                $archivo_r->move($path, $nombre_foto);
            }
            $alumno_creado= Alumno::create($request);
            $alumno_creado->grupos()->attach($r->grupo_id);                    
        }catch (\Illuminate\Database\QueryException $e) {
            if ($r->hasFile('fotografia')) {
                unlink($path.$nombre_foto);
            }
            DB::rollback();        
            $alumno_creado=null;
        }
        DB::commit();
        if (isset($alumno_creado) || !empty($alumno_creado)) {
            Session::flash('success', 'El alumno fue registrado exitosamente.');
            if ($r->subir_documentos) {
                //retornar vista para subir documentos
            }                        
            return redirect('/admin/alumnos/index');
        }
        
        $this->validate(['nombres' => 'max:1' ]);
        Session::flash('error', 'El alumno no pudo ser registrado, compruebe que los campos esten correctamete llenados.');        
        return redirect()->back();
    }

    public function fetchCarrerasWhereNivel(Request $r)
    {        
        $status   = 404;
        $data     = "No existen registros de carreras con este nivel";
        $carreras = Carrera::where('nivel_id', $r->reference_id)
                            ->where('status',true)
                            ->get();     

        if (!is_null($carreras) && !empty($carreras[0])) {
            $status   = 200;
            $data     = $carreras;
        }
        return response()->json(['status' => $status, 'data' => $data ]);
    }
    public function fetchGruposWhereCarrera(Request $r)
    {        

        $grupos = Grupo::select('id','codigo','cupo_maximo')
                        ->where('ciclo_id', Session::get('ciclos')->id)
                        ->where('carrera_id', $r->reference_id)
                        ->get();
        $status = 404;
        $data  = "No se encontraron grupos disponibles en esta carrera.\n No es posible continuar con su registro.\n Reportelo a control escolar.";

        $arr_grupos_disponibles= [];

        foreach ($grupos as $grupo) {             
            $alumnosGrupo = $grupo->alumnos;
            if (count($alumnosGrupo) < $grupo->cupo_maximo){                    
                array_push($arr_grupos_disponibles, $grupo);
                break;
            }
        }        
        if (!empty($arr_grupos_disponibles)) {            
            $status = 200;
            $data   = $arr_grupos_disponibles;
        }            

        return response()->json(['status' => $status, 'data' => $data ]);
    }

    //GET
    public function updateForm(Request $r){
        $alumno = Alumno::find($r->alumno_id);
        $tipo   = $r->tipo_edicion;
        $compact;
        if (isset($this->getCompact()['contadores'])) {            
           $arr = $this->getCompact();
           $arr['tipo'] = $tipo;
           $compact = $arr;
        }else{         
            $arr = $this->getCompact();
            $arr['tipo'] = $tipo;
            $arr['alumno'] = $alumno;
            $compact = $arr;
        }              


        return view('Backend.Alumnos.Formularios.update',$compact);

    }

    private function getCompact(){
        $compact       = null;
        $cfgstatusAlumno = Cfgstatus::where('status', 1)->get();
        $niveles         = Nivel::all();                
        $estados         = Estado::select('id', 'nom_ent')->get();
        $escolaridades   = Escolaridad::select('id', 'nombre')->get();
        $actividades     = ActividadTrabajo::select('id', 'nombre')->get();
        $validar         = empty($cfgstatusAlumno[0])||empty($niveles[0])||
                           empty($estados[0])||empty($escolaridades[0])||empty($actividades[0])||!Session::has('ciclos');
        if ($validar) {
            $contadores =array(count($cfgstatusAlumno),count($niveles),count($estados),count($escolaridades),
                               count($actividades));
            $compact  = compact('contadores');            
        }else{
            $generos            = SysArr::getGeneros();
            $estados_civiles    = SysArr::getEstadosCiviles();
            $parentescos        = SysArr::getParentescos();
            $tipos_bachiller    = SysArr::getTiposBachiller();
            $sistemas_bachiller = SysArr::getSistemasBachiller();
            $lenguas_indigenas  = SysArr::getLenguasIndigenas();
            $compact          = compact('cfgstatusAlumno','niveles','estados','escolaridades','actividades','generos','estados_civiles','parentescos','tipos_bachiller','sistemas_bachiller','lenguas_indigenas');
        }    

        return $compact;


    }

    //POST
    public function update(Request $r){
        if ($r->tipo_update_form == "info") {
            return self::updateInfo($r);
        }elseif($r->tipo_udate_form == "doctos") {
            return self::updateDocuments($r);
        }else{
            return redirect()->back();
        }
    }


    private function updateInfo($r){
        $request = $r->except(['_token','grupo_id','carrera_id','alumno_id','fotografia','tipo_update_form']); 
        $alumno  = Alumno::find($r->alumno_id);
        
        if ($r->hasFile('fotografia')) {
            $path      = storage_path().DSts::$PATH_ALUMN_IMG;
            $archivo_r = $r->file('fotografia');    
            $nombre_foto;
            if ($alumno->fotografia != null) {                
                unlink($path.$alumno->fotografia);  
                $nombre_foto=$alumno->fotografia;                           
            }else{
                $original_name = $r->file('fotografia')->getClientOriginalName();
                $explode       = explode(".", $original_name);
                $extension     = end($explode);
                $nombre_foto   = DSts::$CV_FOTOGRAFIA.DSts::$SFX_ALUM.$alumno->folio->folio.".".$extension;
                $request['fotografia'] = $nombre_foto;
            }
            $archivo_r->move($path, $nombre_foto);
        }
        $updated = $alumno->update($request);
        if ($updated) {
            Session::flash('success', 'La información del alumno fue actualizada exitosamente.');
            return redirect('/admin/alumnos/index');
        }
        Session::flash('error', 'La información del alumno no pudo ser actualizada por favor vuelva a intentar.');
        return redirect()->back();    
    }

    private function updateDocuments($r){
        //alumno_id
        return dd($r->request);
    }

    //POST
    public function fetch()
    {}

    //POST
    public function delete(Request $r)
    {}

    //
    public function destroy($id){}

}
