<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;
use App\Profesor;
use App\Models\Ciclo;
use App\Models\Grupos;
use App\Models\PlanesEst;
use App\Models\Niveles;
use App\ProfesorGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CargaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Session::get('ciclos')){
        
        $profesoresgrupos = ProfesorGrupo::where('idCiclo','=', $this->getCiclo())->get();
        //return $profesoresgrupos;
        return view('carga_academica.index', compact('profesoresgrupos'));

       }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::all();
        $grupos = Grupos::where('id_Ciclo', '=', $this->getCiclo())->get();
        $planes = PlanesEst::all();
        $asignaturas = Asignatura::all();
        $niveles = Niveles::all();
        return view('carga_academica.create', compact('profesores','grupos','planes','asignaturas','niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Session::get('ciclos')){
            $profesorgrupo = new ProfesorGrupo();
            $profesorgrupo->idCiclo=\Session::get('ciclos')->idCiclo;
            $profesorgrupo->id_Grupo=$request->get('grupo');
            $profesorgrupo->idPlan=$request->get('plan');
            $profesorgrupo->idAsignatura=$request->get('asignatura');
            $profesorgrupo->idNivel=$request->get('nivel');
            $profesorgrupo->idProfesor=$request->get('profesor');
            $profesorgrupo->save();
            return Redirect::to('/carga_academica')->with('status','Carga Academica Agregada Correctamente'); 
        }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='/user/admin';}</script>";
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProfesorGrupo::destroy($id);
         return Redirect::to('/carga_academica')->with('status','Carga Academica Eliminada Correctamente'); 


    }
}
