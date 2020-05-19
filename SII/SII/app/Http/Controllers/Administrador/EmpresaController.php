<?php

namespace App\Http\Controllers\Administrador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Empresa;
use DB;


class EmpresaController extends Controller
{

     public function index(Request $request)
    {
    	if ($request) {
    		$query=trim($request->get('searchText'));
    		$empresa = DB::table('empresas')
    		->select('id','nombreEmpresa', 'domicilio', 'telefono', 'email', 'rfc', 'numeroConvenio')
    		->orderBy('id', 'desc')
    		->paginate(7);


            return view('admin.empresa.index', ["empresa" => $empresa, "searchText" => $query]);
    		
    	}
    }

    public function create()
    {
       
    	return view('admin.empresa.create');
    }

    public function store(Request $request)
    {
    	$empre = new Empresa;
    	$empre->servicioSocial=$request->get('servicioSocial');
    	$empre->institucionEduca=$request->get('institucionEduca');
    	$empre->proveedor=$request->get('proveedor');
    	$empre->bolsaTrabajo=$request->get('bolsaTrabajo');
    	$empre->nombreEmpresa=$request->get('nombreEmpresa');
    	$empre->rfc=$request->get('rfc');
    	$empre->entidad=$request->get('entidad');
    	$empre->domicilio=$request->get('domicilio');
        $empre->ciudad=$request->get('ciudad');
        $empre->cp=$request->get('cp');
    	$empre->colonia=$request->get('colonia');
        $empre->status=$request->get('status');
        $empre->numeroConvenio=$request->get('numeroConvenio');
    	$empre->telefono=$request->get('telefono');
        $empre->email=$request->get('email');
        $empre->AreaEnlace=$request->get('AreaEnlace');
        $empre->enlaceCoordinador=$request->get('enlaceCoordinador');
    	$empre->enlaceCoordinadorPuesto=$request->get('enlaceCoordinadorPuesto');
        $empre->fechaConvenio=$request->get('fechaConvenio');
    	$empre->save();

    	return Redirect::to('configurar/empresas');
    }

    public function show()
    {
    	
    }

    public function edit($id)
    {
    	$empresa =Empresa::findOrFail($id);

    	return view("admin.empresa.edit", ["empresa" => $empresa]);
    }

   public function update(Request $request, $id){
       
    	$empre = Empresa::findOrFail($id);
    	$empre->servicioSocial=$request->get('servicioSocial');
    	$empre->institucionEduca=$request->get('institucionEduca');
    	$empre->proveedor=$request->get('proveedor');
    	$empre->bolsaTrabajo=$request->get('bolsaTrabajo');
    	$empre->nombreEmpresa=$request->get('nombreEmpresa');
    	$empre->rfc=$request->get('rfc');
    	$empre->domicilio=$request->get('domicilio');
        $empre->ciudad=$request->get('ciudad');
        $empre->entidad=$request->get('entidad');
        $empre->cp=$request->get('cp');
    	$empre->colonia=$request->get('colonia');
        $empre->status=$request->get('status');
        $empre->numeroConvenio=$request->get('numeroConvenio');
    	$empre->telefono=$request->get('telefono');
        $empre->email=$request->get('email');
        $empre->AreaEnlace=$request->get('AreaEnlace');
        $empre->enlaceCoordinador=$request->get('enlaceCoordinador');
    	$empre->enlaceCoordinadorPuesto=$request->get('enlaceCoordinadorPuesto');
        $empre->fechaConvenio=$request->get('fechaConvenio');
    	
    	
    	$empre->update();
    	return Redirect::to('configurar/empresas');
    }

    public function destroy($id){

    	$empre=Empresa::findOrFail($id);
        $alumn=DB::table('alumno_empresa')
        ->select('id', 'empresa_id')
        ->where('empresa_id', '=', $empre->id)
        ->get();

        if (count($alumn)>=1) {
           
           return json_encode("No puedes Eliminar esta empresa porque esta ligado a uno o mas alumnos");
        }else{
    	$empre->delete();
        return Redirect::to('configurar/empresas');
        }
    	

    }
}
