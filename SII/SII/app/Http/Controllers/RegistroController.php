<?php

namespace App\Http\Controllers;
use App\Models\Alumnos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class RegistroController extends Controller
{
    
    
    public function index() {
        
        return view('register.register');
    }
    
    
    public function create(){}
    
    /*public function store (Request $request){
        $alumno = Alumnos::create($request->all());
        return redirect()->route('register.register', $alumno->id)->
        with('info', 'Alumno registrado con exito');
        
    }*/
       public function store(Request $request){

    $registro = new Alumnos();
    $registro->Status=$request->estatus;
    $registro->Estado_Civil=$request->estado_civil;
    $registro->Estado_Nac=$request->estados;
    $registro->Carrera=$request->carrera;
    $registro->Nivel=$request->nivel;
    $registro->Paterno=$request->primerApe;
    $registro->Materno=$request->segundoApe;
    $registro->Nombres=$request->nom;
    $registro->Fecha_Nac=$request->get('fechaNac');
    $registro->Clave_Ciudadana=$request->curp;
    $registro->Genero=$request->genero;
    $registro->Domicilio=$request->domi;
    $registro->Escuela_Procedencia=$request->escuelaProce;
    $registro->Email=$request->Email;
    $registro->Parentesco_Contacto=$request->parentesco;
    $registro->Celular=$request->cell;
    $registro->Promedio_Bachillerato=$request->promedio;
    $registro->CP=$request->codigoP;
    $registro->Estado_Bachillerato=$request->estado1;
    $registro->Estado=$request->estado;
    $registro->Ciudad=$request->ciudad;
    $registro->Municipio=$request->municipio;
    $registro->Contacto=$request->contacto;
    $registro->Tel_Contacto=$request->tel_contacto;
    $registro->Municipio_Bachillerato=$request->bachillerato_municipio;
    

    $registro->save();
        return view('register.register')->with('info', 'Felicidades tu registro se ha guardado exitosamente');

}

    public function documentos(){
        return view('register.documentos');
    }

}