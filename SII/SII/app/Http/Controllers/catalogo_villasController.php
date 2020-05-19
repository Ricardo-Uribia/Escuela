<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\Models\Grupos;
use App\catalogo_villa;
use App\alumnos_villa;
use App\Models\Alumnos;
use App\Models\Ciclo;
use App\Models\AlumnosGrupos;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class catalogo_villasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    /*public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $catalogo_villas = catalogo_villa::where('idcatalogo_villas', 'LIKE', "%$keyword%")
                ->orWhere('idCiclo', 'LIKE', "%$keyword%")
                ->orWhere('idgrupos_villas', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('cupoMaximo', 'LIKE', "%$keyword%")
                ->orWhere('responsableVilla', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $catalogo_villas = catalogo_villa::latest()->paginate($perPage);
        }

        return view('catalogo_villas.index', compact('catalogo_villas'));
    }*/

       public function index(Request $request) 
     {
      if(\Session::get('ciclos')){
        
        $catalogo_villa=DB::table('ciclo as cc')
            ->Join('catalogo_villas as cv', 'cv.idcatalogo_villas', '=', 'cc.idCiclo')
            ->select('cv.idcatalogo_villas', 'cv.idCiclo','cv.idgrupos_villas' ,'cv.genero', 'cv.cupoMaximo', 'cv.responsableVilla')
            ->where('cv.idCiclo','=', $this->getCiclo())
            ->get();
        return view('catalogo_villas.index',['catalogo_villa' => $catalogo_villa]);

            
      }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('catalogo_villas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        catalogo_villa::create($requestData);

        return redirect('catalogo_villas')->with('info', 'catalogo_villa agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $catalogo_villa = catalogo_villa::findOrFail($id);

        return view('catalogo_villas.show', compact('catalogo_villa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $catalogo_villa = catalogo_villa::findOrFail($id);

        return view('catalogo_villas.edit', compact('catalogo_villa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $catalogo_villa = catalogo_villa::findOrFail($id);
        $catalogo_villa->update($requestData);

        return redirect('catalogo_villas')->with('flash_message', 'catalogo_villa updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        catalogo_villa::destroy($id);

        return redirect('catalogo_villas')->with('info', 'catalogo_villa eliminado exitosamente!');
    }

    public function registroVilla($id)

    {
            $catalogo_villa=catalogo_villa::findOrFail($id);
           $grupo=Grupos::findOrFail($id);
            $catalogovilla=DB::table('catalogo_villas as cv')
            ->join('alumnos_villas as av','av.idcatalogo_villas','=','cv.idcatalogo_villas')
            ->leftjoin('alumnos as alum', 'av.idalumno', '=', 'alum.id')
            ->leftjoin('alumnosgrupos as algru', 'av.idalumno', '=', 'algru.id')
            ->select('av.idalumnos_villas','alum.Nombres','alum.Matricula', 'alum.Carrera', 'alum.Genero', 'algru.id_grupo')
            ->where('cv.idcatalogo_villas', '=', $id)
            ->get();
      
        return view('catalogo_villas.registroVillas', ['catalogovilla' => $catalogovilla, 'grupo'=>$grupo, 'catalogo_villa'=>$catalogo_villa]);
    }




        public function buscarrick ( Request $request, $id)
    {
      $buscar = $request->get ('buscarAlumnoRick');
      $catalogo_villa=catalogo_villa::findOrFail($id);
     
     

      $listaAlumno=Alumnos::where('Matricula','LIKE',"%$buscar%")->get();
      return view('catalogo_villas.buscarAlumno', compact('listaAlumno', 'catalogo_villa')); 

    }

    public function agregarricardo(Request $request, $id)
    {

    
            
    $nuevoAlumno = new alumnos_villa();
    
    $nuevoAlumno->idCiclo=$request->idCiclo;
    $nuevoAlumno->idalumno=$request->id;
    $nuevoAlumno->idgrupo=$request->idgrupo;
    $nuevoAlumno->idcatalogo_villas=$request->idcatalogo_villas;
    $nuevoAlumno->fecha_ingreso=$request->fecha_ingreso;
    $nuevoAlumno->costo_viaje=$request->costo_viaje;
    $nuevoAlumno->tiempo_viaje=$request->tiempo_viaje;
    $nuevoAlumno->observaciones_villa=$request->observaciones_villa;
    $nuevoAlumno->save();

    return redirect('/buscarAlumnoRick/'. $id)->with('status','Registro con exito!!');

  
}

        


}
