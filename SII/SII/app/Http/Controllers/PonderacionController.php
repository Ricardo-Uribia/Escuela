<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfesorGrupo;
use App\Models\Asignatura;
use App\Profesor;
use App\Models\Ciclo;



class PonderacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       if(\Session::get('ciclos')){

        
        $profesoresgrupos = ProfesorGrupo::all();
        $profesores = Profesor::all();
        return view('calificaciones.ponderacion',compact('profesoresgrupos','profesores'));


       }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $profesor = Profesor::all();
    //     $asignatura = Asignatura::all();
    //     return view('calificaciones.ponderacion', compact('profesor','asignaturas'));
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Session::get('ciclos')){
            $ciclo =\Session::get('ciclos')->idCiclo;
            $profesor =$request->get('profesor');
            $asignatura = $request->get('asignatura');

            return $ciclo.$profesor.$asignatura;

        }else{

            return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";

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
        //
    }

    /*public function SeleccionarAsignaturas (Request $request)
    {
        $buscar = $request->get ('Profesor');

        $listacliente=ProfesorGrupo::where('idProfesor', 'LIKE', "%$buscar%")->get();
        return view('suscripcion.index', compact('listacliente'));
    }*/
}
