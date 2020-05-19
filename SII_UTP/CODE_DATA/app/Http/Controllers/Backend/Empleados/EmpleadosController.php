<?php

namespace App\Http\Controllers\Backend\Empleados;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Empleados\Empleado;
use App\Models\Configuracion\Estado;
use App\Models\Empleados\Profesores\Profesor;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
use App\Services\Internal\CRUDControllersInterface;
use App\Services\Internal\DocumentStatements as DSts;
use Illuminate\Support\Facades\Storage;



class EmpleadosController extends Controller implements CRUDControllersInterface
{
    public function index()
    {	
    	$empleados = Empleado::paginate(10);
    	return view('Backend.Empleados.index')->with("empleados", $empleados);
	}

	public function createForm()
	{	
		$estados = Estado::all();
		return view('Backend.Empleados.Formularios.create')->with('estados', $estados);
	}

	public function create(Request $r)
	{	

		$now = new \DateTime();
 		$r['created_at'] = $now->format('Y-m-d H:i:s');
 		$r['updated_at'] = $now->format('Y-m-d H:i:s');
		$datosEmpleado = $r->except('_token','edad');
		try {
			if ($r->hasFile('foto')) {
				$path 		   = storage_path().DSts::$PATH_EMPLE_IMG;
				$archivo_r     = $r->file('foto');    
	            $original_name = $archivo_r->getClientOriginalName();
	            $explode       = explode(".", $original_name);
	            $extension     = end($explode);
	            $nombre_foto   = "IMG_emple_".time().".".$extension;
				$datosEmpleado['foto'] = $nombre_foto;
				$archivo_r->move($path, $nombre_foto);
			}
			Empleado::insert($datosEmpleado);
			Session::flash('success', 'Se ha registrado con éxito');
		} catch (QueryException $e) {
			Session::flash('error', 'Oupsss... Ha ocurrido un error, ' .$e);
		}
		return redirect('/admin/list-empleados');
	}

    public function show()
    {
    	
    }

	public function updateForm(Request $r)
	{
		$estados = Estado::all();
		$empleado = Empleado::find($r->id);
		return view('Backend.Empleados.Formularios.update')->with(["empleado" => $empleado, "estados" => $estados]);
	}

	public function update(Request $r)
	{	

		$id = $r->id;
		$clave_profesor = $r->clave_profesor;
		$datosEmpleado = $r->except('_token', 'docto_estudio', 'clave_profesor');
		if ($r->hasFile('foto')) {
			$path      = storage_path().DSts::$PATH_EMPLE_IMG;
			$empleado = Empleado::find($id);
			$archivo_r = $r->file('foto');   
			$nombre_foto;
			if ($empleado->foto != null) {
			 	unlink($path.$empleado->foto);  
                $nombre_foto=$empleado->foto; 
			 }else{
			 	$original_name = $r->file('foto')->getClientOriginalName();
                $explode       = explode(".", $original_name);
                $extension     = end($explode);
                $nombre_foto   = "IMG_emple_".time().".".$extension;
			} 
			$archivo_r->move($path, $nombre_foto);
			$datosEmpleado['foto'] = $nombre_foto;
		}
		Empleado::where('id', $id)->update($datosEmpleado);
		if ($r->tipo == 2 || $r->tipo == 3) {
			$this->validate($r,['clave_profesor' => 'required']);
			$this->llenarTablaProfesor($id,$clave_profesor, $datosEmpleado);
		}
		Session::flash('success', 'Se ha actualizado con éxito');
		return redirect('/admin/list-empleados');
		
	}

	public function destroy($id){

        $emple = Empleado::	find($id);

        if ($emple->Profesor()->first()) {
        	$profe = Profesor::where('empleado_id', $emple->id)->first();
        	$profe->forceDelete();
        }elseif ($emple->maestria || $emple->doctorado || $emple->post_doctorado)
        {
        	if ($emple->maestria == "true") {
        		Storage::disk('document_employee')->delete($emple->docto_titulo_maestria);
        		Storage::disk('document_employee')->delete($emple->docto_cedula_maestria);
        	}
        	if($emple->doctorado == "true"){
	        	Storage::disk('document_employee')->delete($emple->docto_titulo_doctorado);
	        	Storage::disk('document_employee')->delete($emple->docto_cedula_doctorado);	        
        	}

        	if($emple->post_doctorado == "true"){
	        	Storage::disk('document_employee')->delete($emple->docto_titulo_post_doctorado);
	        	Storage::disk('document_employee')->delete($emple->docto_cedula_post_doctorado);
        	}
        }
        $emple->forceDelete();
		return redirect('/admin/list-empleados');
	}

	public function delete(Request $r)
	{
		# code...
	}

	public function details($id)
	{
		# code...
	}

	public function fetch()
	{
		# code...
	}

	private function llenarTablaProfesor($empleado_id, $clave_profesor, $datosEmpleado)
	{
		try {
 			DB::beginTransaction();
 				Empleado::where('id', $empleado_id)->update($datosEmpleado);
 				$profe = new Profesor();
 				$profe->clave = $clave_profesor;
 				$profe->empleado_id = $empleado_id;
 				$profe->save();
 			DB::commit();
 			return true;
 		} catch (QueryException $e) {
 			DB::rollback();
        	return false;
 		}
	}

	public function uploadDocuments($id){
		return view('Backend.Empleados.Formularios.uploadDoct')->with('empleado', Empleado::find($id));
	}


	public function uploadDocument(Request $r)
	{	
		$empleado = Empleado::find($r->empleado_id);
		$datosEmpleado = $r->except('_token', 'docto_estudio', 'empleado_id');
		$documentos_ = $r->file('docto_estudio');
		$nombre_docto = "";
		if ($r->hasFile('docto_estudio')) {
				foreach ($documentos_ as $key => $files) {
					if ($key == 0) {
						$nombre_docto = DSts::$TITULO_PROFECIONAL."MAESTRIA_".$r->id.".pdf";
						$datosEmpleado['docto_titulo_maestria'] = "estudios/". $nombre_docto;
					}elseif ($key == 1) {
	                    $nombre_docto = DSts::$CEDULA_PROFECIONAL ."MAESTRIA_".$r->id.".pdf";
	                    $datosEmpleado['docto_cedula_maestria'] = "estudios/". $nombre_docto;
	                }elseif ($key == 2) {
	                    $nombre_docto = DSts::$TITULO_PROFECIONAL."DOCTORADO_".$r->id.".pdf";
	                    $datosEmpleado['docto_titulo_doctorado'] = "estudios/". $nombre_docto;
	                }elseif ($key == 3) {
	                    $nombre_docto = DSts::$CEDULA_PROFECIONAL ."DOCTORADO_".$r->id.".pdf";
	                    $datosEmpleado['docto_cedula_doctorado'] = "estudios/". $nombre_docto;
	                }elseif ($key == 4) {
	                    $nombre_docto = DSts::$TITULO_PROFECIONAL."POST_DOCTORADO_".$r->id.".pdf";
	                    $datosEmpleado['docto_titulo_post_doctorado'] = "estudios/". $nombre_docto;
	                }elseif ($key == 5) {
	                    $nombre_docto = DSts::$CEDULA_PROFECIONAL ."POST_DOCTORADO_".$r->id.".pdf";
	                    $datosEmpleado['docto_cedula_post_doctorado'] = "estudios/". $nombre_docto;
	                }
	                $files->storeAs('estudios', $nombre_docto, 'document_employee');
	            }
		}
		Empleado::where('id', $r->id)->update($datosEmpleado);

	}

}
