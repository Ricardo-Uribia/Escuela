<?php

namespace App\Http\Controllers\Alumno;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActMadre;
use App\Models\Estado;
use App\Models\ActConyuge;
use App\Models\ActPadre;
use App\Models\ActTrabajas;
use App\Models\EscConyuge;
use App\Models\EscMadre;
use App\Models\EscPadre;
use App\Models\Alumnos;
use App\Models\Documento;
use Illuminate\Support\Facades\Redirect;
use App\Archivos;
use App\Models\Grupos;
use App\Models\Ciclo;
use Illuminate\Support\Facades\DB;


class AlumnoController extends Controller
{ 
	public function index(){
        $alum = Alumnos::all();
    
		return view('partials.alumnos.alumnosTodos', compact('alum'));
	}

    public function crearAlumno(){
        

    	$actMadre=ActMadre::all();
    	$estados=Estado::all(); 
    	$actConyuge=ActConyuge::all();
      $actPadre=ActPadre::all();
      $actTrabajas=ActTrabajas::all();
      $escConyuge=EscConyuge::all();
      $escMadre=EscMadre::all();
      $escPadre=EscPadre::all(); 
       
	return view('partials.alumnos.crearAlumno', ['actMadre'=>$actMadre, 'estados'=>$estados, 'actConyuge'=>$actConyuge, 
    'actPadre'=>$actPadre, 'actTrabajas'=>$actTrabajas, 'escConyuge'=>$escConyuge, 'escMadre'=>$escMadre, 
    'escPadre'=>$escPadre]);
	
   }
    public function crearAlumno2($id){

        $actMadre=ActMadre::all();
        $estados=Estado::all();
        $actConyuge=ActConyuge::all();
      $actPadre=ActPadre::all();
      $actTrabajas=ActTrabajas::all();
      $escConyuge=EscConyuge::all();
      $escMadre=EscMadre::all();
      $escPadre=EscPadre::all();
        $alum = Alumnos::findOrFail($id);
        
        $documentos= Archivos::where('alumno_id', $id)->get();

         //$documentos = Archivos::where('alumno_id', $id)->first();



    return view('partials.alumnos.updateAlumno', ['actMadre'=>$actMadre, 'estados'=>$estados, 'actConyuge'=>$actConyuge, 
    'actPadre'=>$actPadre, 'actTrabajas'=>$actTrabajas, 'escConyuge'=>$escConyuge, 'escMadre'=>$escMadre, 
    'escPadre'=>$escPadre, 'alum' =>  $alum, 'documentos'=> $documentos ]);
    
   }

   public function buscarAlumno(){

   	return view('partials.alumnos.buscarAlumnos');
   }

   public function store(Request $request){

    $nuevoAlumno = new Alumnos();
    $nuevoAlumno->Matricula=$request->Matricula;
    $nuevoAlumno->Status=$request->status;
    $nuevoAlumno->Nivel=$request->nivel;
    $nuevoAlumno->Carrera=$request->Carrera;
    $nuevoAlumno->Folio=$request->folioAlumn;
    $nuevoAlumno->Notas=$request->notas;
    $nuevoAlumno->Paterno=$request->paternoAlumn;
    $nuevoAlumno->Materno=$request->maternoAlumn;
    $nuevoAlumno->Nombres=$request->nombre;
    $nuevoAlumno->Genero=$request->genero;
    $nuevoAlumno->Estado_Civil=$request->civilAlumn;
    $nuevoAlumno->Fecha_Nac=$request->FechaNacAlumn;
    $nuevoAlumno->Lugar_Nac=$request->lugarAlumn;
    $nuevoAlumno->Estado_Nac=$request->Estado_Nac;
    $nuevoAlumno->Municipio_Nac=$request->municipioAlumn;
    $nuevoAlumno->Edad=$request->edadAlumn;
    $nuevoAlumno->Clave_Ciudadana=$request->curpAlumn;
    $nuevoAlumno->Domicilio=$request->domicilioAlumn;
    $nuevoAlumno->Ciudad=$request->ciudadAlumn;
    $nuevoAlumno->Municipio=$request->munalumn;
    $nuevoAlumno->Estado=$request->Estado;
    $nuevoAlumno->CP=$request->cpAlumn;
    $nuevoAlumno->Telefono=$request->telAlumn;
    $nuevoAlumno->Celular=$request->celAlumn;
    $nuevoAlumno->Email=$request->correoAlumn;
    $nuevoAlumno->Persona_Autorizada=$request->personaAutoAlumn;
    $nuevoAlumno->Parentesco_Autorizada=$request->parentescoAlumn;
    $nuevoAlumno->Telefono_Autorizada=$request->telAuto;

      $nuevoAlumno->Misma_Autorizada=$request->tipo_attach;

  

    $nuevoAlumno->Escuela_Procedencia=$request->nomEsc;
    $nuevoAlumno->Municipio_Bachillerato=$request->munBach;
    $nuevoAlumno->Estado_Bachillerato=$request->Estado_Bachillerato;
    //Agregar un nuevo campo en periodo de bachillerato (inicio/fin)
    $nuevoAlumno->Inicio_Bachillerato=$request->inicio;
    $nuevoAlumno->Fin_Bachillerato=$request->fin;
    $nuevoAlumno->Tipo_Bachillerato=$request->tipoBach;
    $nuevoAlumno->Sistema_Bachillerato=$request->sisBach;
    $nuevoAlumno->Promedio_Bachillerato=$request->promedioBach;
    $nuevoAlumno->Fecha_Creacion=$request->fechaCrea;
    $nuevoAlumno->Fecha_Actualizacion=$request->fechaAct;
    $nuevoAlumno->Fecha_Registro=$request->fechaReg;
    $nuevoAlumno->Fecha_Ingreso=$request->fechaIng;
    $nuevoAlumno->Fecha_Egreso=$request->fechaEg;
    $nuevoAlumno->Promedio_Admision=$request->promAd;
    $nuevoAlumno->Solicita_Beca=$request->solcBeca;
    $nuevoAlumno->Autoriza_Beca=$request->autorizaBeca;
    $nuevoAlumno->Tipo_Beca=$request->tipoBeca;
    $nuevoAlumno->Folio_Ibecey=$request->folioIbecey;
    $nuevoAlumno->Folio_Subes=$request->folioSubes;
    $nuevoAlumno->Beca_Transporte=$request->becaTrans;
    $nuevoAlumno->Origen_Indigena=$request->origenAlumn;
    $nuevoAlumno->Lengua_Indigena=$request->lengAlumn;
    $nuevoAlumno->Discapacidad=$request->disc;
    $nuevoAlumno->Enfermedad=$request->enfermedad;
    $nuevoAlumno->Alergias=$request->alergias;
    $nuevoAlumno->Peso=$request->peso;
    $nuevoAlumno->Talla=$request->talla;
    $nuevoAlumno->Nombre_Padre=$request->nomPad;
    $nuevoAlumno->Nombre_Madre=$request->nomMad;
    $nuevoAlumno->Escolaridad_Padre=$request->escPad;
    $nuevoAlumno->Escolaridad_Madre=$request->escMad;
    $nuevoAlumno->Actividad_Padre=$request->actPad;
    $nuevoAlumno->Actividad_Madre=$request->actMad;
    $nuevoAlumno->Automovil_Familiar=$request->autoFam;
    $nuevoAlumno->Computadora=$request->compu;
    $nuevoAlumno->Tipo_Seg_Med=$request->segMed;
    $nuevoAlumno->Numero_IMSS=$request->numsegMed;
        $nuevoAlumno->Num_imss_verificador=$request->Num_imss_verificador;

    $nuevoAlumno->Tamano_Casa=$request->casa;
    $nuevoAlumno->Ingreso_Familiar=$request->ingreso;
    $nuevoAlumno->Personas_Dependen_Ingreso=$request->dependenIng;
    $nuevoAlumno->Viven_En_Casa=$request->personasCasa;
    $nuevoAlumno->Hermanos=$request->herm;
    $nuevoAlumno->Lugar_Nac_Herm=$request->nacHerm;
    $nuevoAlumno->Herm_Estudian=$request->estHerm;
    $nuevoAlumno->Trabajas=$request->trab;
    $nuevoAlumno->Act_Trabajas=$request->actTrabajas;
    $nuevoAlumno->Horario_Trabajo=$request->horTrab;
    $nuevoAlumno->Nombre_Conyuge=$request->nomConyuge;
    $nuevoAlumno->Escolaridad_Conyuge=$request->escCon;
    $nuevoAlumno->Actividad_Conyuge=$request->actCon;
    $nuevoAlumno->Hijos=$request->tipo;
    $nuevoAlumno->Edad_Hijos0a5=$request->hijos1;
    $nuevoAlumno->Edad_Hijos6a12=$request->hijos2;
    $nuevoAlumno->Edad_Hijos13a18=$request->hijos3;
    $nuevoAlumno->Hijos_Mayores18=$request->hijos4;
    $nuevoAlumno->Ingreso_Percapita=$request->ingresoPer;
    $nuevoAlumno->Telefono_Trabajo=$request->telTrabajo;

     if ($request->tipo_attach=='a') { 
        
        
        $nuevoAlumno->Contacto=$nuevoAlumno->Persona_Autorizada;
        $nuevoAlumno->Parentesco_Contacto=$nuevoAlumno->Parentesco_Autorizada;
        $nuevoAlumno->Tel_Contacto=$nuevoAlumno->Telefono_Autorizada;

       
    }

    else {
        
    $nuevoAlumno->Contacto=$request->nombreContact;
    $nuevoAlumno->Parentesco_Contacto=$request->parentescoContact;
    $nuevoAlumno->Tel_Contacto=$request->telcontact;

    }
  

    $nuevoAlumno->save();
    
    return Redirect::to('lista');

   }

    public function edit($id)
    {
      $alumnos = Alumnos::FindOrFail($id);
       return view('partials.alumnos.edit2', compact('alumnos'));
    
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
        $alumnos = Alumnos::FindOrFail($id);

        $alumnos->Folio = $request->folioAlumn;
        $alumnos->Notas = $request->notas;
       // $alumnos->Telefono=$request->telAlumn;
        //$alumnos->Celular=$request->celAlumn;
        //$alumnos->Email=$request->correoAlumn;


        $alumnos->Matricula = $request->matricula;
        $alumnos->Nivel = $request->nivel;
        //$alumnos->Nombre = $request->nombre;
        //$alumnos->Genero = $request->genero;
        $alumnos->Status = $request->status;
        $alumnos->Grupo = $request->grupo;
        $alumnos->save();
        return Redirect::to('lista');

        //Sacar los campos nulos de Store y agregarlos a este apartado de update 
    }

     public function update2(Request $request, $id)
    {
        $alumn = Alumnos::FindOrFail($id);

        $alumn->Folio = $request->folioAlumn;
        $alumn->Notas = $request->notas;
        $alumn->Telefono=$request->telAlumn;
        $alumn->Celular=$request->celAlumn;
        $alumn->Genero=$request->genero;
        $alumn->Email=$request->correoAlumn;
        $alumn->Fecha_Actualizacion=$request->fechaAct;
        $alumn->Fecha_Registro=$request->fechaReg;
        $alumn->Fecha_Ingreso=$request->fechaIng;
        $alumn->Fecha_Egreso=$request->fechaEg;
        $alumn->Promedio_Admision=$request->promAd;
        $alumn->Solicita_Beca=$request->solcBeca;
        $alumn->Autoriza_Beca=$request->autorizaBeca;
        $alumn->Tipo_Beca=$request->tipoBeca;
        $alumn->Folio_Ibecey=$request->folioIbecey;
        $alumn->Folio_Subes=$request->folioSubes;
        $alumn->Beca_Transporte=$request->becaTrans;
        $alumn->Trabajas=$request->trab;
        $alumn->Act_Trabajas=$request->actTrabajas;
        $alumn->Horario_Trabajo=$request->horTrab;
        $alumn->Nombre_Conyuge=$request->nomConyuge;
        $alumn->Escolaridad_Conyuge=$request->escCon;
        $alumn->Actividad_Conyuge=$request->actCon;
        $alumn->Hijos=$request->tipo;
        $alumn->Edad_Hijos0a5=$request->hijos1;
        $alumn->Edad_Hijos6a12=$request->hijos2;
        $alumn->Edad_Hijos13a18=$request->hijos3;
        $alumn->Hijos_Mayores18=$request->hijos4;
        $alumn->Telefono_Trabajo=$request->telTrabajo;
        //$alumnos->Telefono=$request->telAlumn;
        //$alumnos->Celular=$request->celAlumn;
        //$alumnos->Email=$request->correoAlumn;


    
        $alumn->save();
        return Redirect::to('lista');

     
    }


    public function destroy($id)
    {
        try{
            $alumnos = Alumnos::findOrFail($id);
            $alumnos->delete();
            return Redirect::to('lista');
        } catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
    
    public function estadiaricardo()
    {
        if(\Session::get('ciclos')){
            
        $grupo=DB::table('grupos as g')
            ->leftJoin('niveles as n', 'g.id_Carrera', '=', 'n.id')
            ->leftJoin('empleados as e', 'g.id_Profesor', '=' ,'e.id')
            ->select('g.Cuatrimestre', 'g.Codigo_Grupo','g.Tipo_Grupo' ,'g.Cupo_Maximo', 'g.Diferenciador_Grupo', 'g.Turno', 'g.id_Ciclo', 
                'n.Identificador', 'e.NombreEmpleado', 'g.id')
            ->where('g.id_Ciclo','=', $this->getCiclo())
            ->get();
            
       return view('estadia.grupos',['grupo' => $grupo]);

    }else{

        return "<script>var confirmar = confirm('Hemos Detectado que no se ha Seleccionado un Ciclo para Trabajar, Por favor Seleccione uno para Continuar');if(confirmar == true){location.href ='user/admin';}</script>";
    }
    }
    
    public function verAlumnosdeUnGrupo($id)
    {
        $grupo=Grupos::findOrFail($id);

      $alumnogrupo=DB::table('alumnosgrupos as ag')
            ->join('alumnos as a', 'ag.id_alumno', '=', 'a.id')
            ->select('a.Matricula', 'a.Nombres','a.Paterno','a.Materno','a.Status' ,'a.Genero','ag.id_alumno','ag.id')
            ->where('ag.id_Grupo','=',$id)
            ->orderByRaw ("Paterno")
            ->get();
            return view('estadia.estadiaAlumno', ['alumnogrupo' => $alumnogrupo, "grupo" => $grupo]);
            
            
    }
    
       public function estadiaficha($id)
       {

        $actMadre=ActMadre::all();
        $estados=Estado::all();
        $actConyuge=ActConyuge::all();
      $actPadre=ActPadre::all();
      $actTrabajas=ActTrabajas::all();
      $escConyuge=EscConyuge::all();
      $escMadre=EscMadre::all();
      $escPadre=EscPadre::all();
        $alum = Alumnos::findOrFail($id);
        
        $documentos= Archivos::where('alumno_id', $id)->get();

     

    return view('estadia.estadiaseg', ['actMadre'=>$actMadre, 'estados'=>$estados, 'actConyuge'=>$actConyuge, 
    'actPadre'=>$actPadre, 'actTrabajas'=>$actTrabajas, 'escConyuge'=>$escConyuge, 'escMadre'=>$escMadre, 
    'escPadre'=>$escPadre, 'alum' =>  $alum, 'documentos'=> $documentos ]);
    
   }
   public function editarAlumno($id)
    {
      $documentos = Documento::all();
      $alum = Alumnos::FindOrFail($id);
       return view('partials.alumnos.editarrr', compact('alum','documentos'));
    
    }


    public function Actualizar(Request $request, $id){
    $nuevoAlumno=Alumnos::findOrFail($id);
    $nuevoAlumno->Matricula=$request->Matricula;
    $nuevoAlumno->Status=$request->status;
    $nuevoAlumno->Nivel=$request->nivel;
    $nuevoAlumno->Carrera=$request->Carrera;
    $nuevoAlumno->Folio=$request->folioAlumn;
    $nuevoAlumno->Notas=$request->notas;
    $nuevoAlumno->Paterno=$request->paternoAlumn;
    $nuevoAlumno->Materno=$request->maternoAlumn;
    $nuevoAlumno->Nombres=$request->nombre;
    $nuevoAlumno->Genero=$request->genero;
    $nuevoAlumno->Estado_Civil=$request->civilAlumn;
    $nuevoAlumno->Fecha_Nac=$request->FechaNacAlumn;
    $nuevoAlumno->Lugar_Nac=$request->lugarAlumn;
    $nuevoAlumno->Estado_Nac=$request->Estado_Nac;
    $nuevoAlumno->Municipio_Nac=$request->municipioAlumn;
    $nuevoAlumno->Edad=$request->edadAlumn;
    $nuevoAlumno->Clave_Ciudadana=$request->curpAlumn;
    $nuevoAlumno->Domicilio=$request->domicilioAlumn;
    $nuevoAlumno->Ciudad=$request->ciudadAlumn;
    $nuevoAlumno->Municipio=$request->munalumn;
    $nuevoAlumno->Estado=$request->Estado;
    $nuevoAlumno->CP=$request->cpAlumn;
    $nuevoAlumno->Telefono=$request->telAlumn;
    $nuevoAlumno->Celular=$request->celAlumn;
    $nuevoAlumno->Email=$request->correoAlumn;
    $nuevoAlumno->Persona_Autorizada=$request->personaAutoAlumn;
    $nuevoAlumno->Parentesco_Autorizada=$request->parentescoAlumn;
    $nuevoAlumno->Telefono_Autorizada=$request->telAuto;

      $nuevoAlumno->Misma_Autorizada=$request->tipo_attach;

  

    $nuevoAlumno->Escuela_Procedencia=$request->nomEsc;
    $nuevoAlumno->Municipio_Bachillerato=$request->munBach;
    $nuevoAlumno->Estado_Bachillerato=$request->Estado_Bachillerato;
    //Agregar un nuevo campo en periodo de bachillerato (inicio/fin)
    $nuevoAlumno->Inicio_Bachillerato=$request->inicio;
    $nuevoAlumno->Fin_Bachillerato=$request->fin;
    $nuevoAlumno->Tipo_Bachillerato=$request->tipoBach;
    $nuevoAlumno->Sistema_Bachillerato=$request->sisBach;
    $nuevoAlumno->Promedio_Bachillerato=$request->promedioBach;
    $nuevoAlumno->Fecha_Creacion=$request->fechaCrea;
    $nuevoAlumno->Fecha_Actualizacion=$request->fechaAct;
    $nuevoAlumno->Fecha_Registro=$request->fechaReg;
    $nuevoAlumno->Fecha_Ingreso=$request->fechaIng;
    $nuevoAlumno->Fecha_Egreso=$request->fechaEg;
    $nuevoAlumno->Promedio_Admision=$request->promAd;
    $nuevoAlumno->Solicita_Beca=$request->solcBeca;
    $nuevoAlumno->Autoriza_Beca=$request->autorizaBeca;
    $nuevoAlumno->Tipo_Beca=$request->tipoBeca;
    $nuevoAlumno->Folio_Ibecey=$request->folioIbecey;
    $nuevoAlumno->Folio_Subes=$request->folioSubes;
    $nuevoAlumno->Beca_Transporte=$request->becaTrans;
    $nuevoAlumno->Origen_Indigena=$request->origenAlumn;
    $nuevoAlumno->Lengua_Indigena=$request->lengAlumn;
    $nuevoAlumno->Discapacidad=$request->disc;
    $nuevoAlumno->Enfermedad=$request->enfermedad;
    $nuevoAlumno->Alergias=$request->alergias;
    $nuevoAlumno->Peso=$request->peso;
    $nuevoAlumno->Talla=$request->talla;
    $nuevoAlumno->Nombre_Padre=$request->nomPad;
    $nuevoAlumno->Nombre_Madre=$request->nomMad;
    $nuevoAlumno->Escolaridad_Padre=$request->escPad;
    $nuevoAlumno->Escolaridad_Madre=$request->escMad;
    $nuevoAlumno->Actividad_Padre=$request->actPad;
    $nuevoAlumno->Actividad_Madre=$request->actMad;
    $nuevoAlumno->Automovil_Familiar=$request->autoFam;
    $nuevoAlumno->Computadora=$request->compu;
    $nuevoAlumno->Tipo_Seg_Med=$request->segMed;
    $nuevoAlumno->Numero_IMSS=$request->numsegMed;
        $nuevoAlumno->Num_imss_verificador=$request->Num_imss_verificador;

    $nuevoAlumno->Tamano_Casa=$request->casa;
    $nuevoAlumno->Ingreso_Familiar=$request->ingreso;
    $nuevoAlumno->Personas_Dependen_Ingreso=$request->dependenIng;
    $nuevoAlumno->Viven_En_Casa=$request->personasCasa;
    $nuevoAlumno->Hermanos=$request->herm;
    $nuevoAlumno->Lugar_Nac_Herm=$request->nacHerm;
    $nuevoAlumno->Herm_Estudian=$request->estHerm;
    $nuevoAlumno->Trabajas=$request->trab;
    $nuevoAlumno->Act_Trabajas=$request->actTrabajas;
    $nuevoAlumno->Horario_Trabajo=$request->horTrab;
    $nuevoAlumno->Nombre_Conyuge=$request->nomConyuge;
    $nuevoAlumno->Escolaridad_Conyuge=$request->escCon;
    $nuevoAlumno->Actividad_Conyuge=$request->actCon;
    $nuevoAlumno->Hijos=$request->tipo;
    $nuevoAlumno->Edad_Hijos0a5=$request->hijos1;
    $nuevoAlumno->Edad_Hijos6a12=$request->hijos2;
    $nuevoAlumno->Edad_Hijos13a18=$request->hijos3;
    $nuevoAlumno->Hijos_Mayores18=$request->hijos4;
    $nuevoAlumno->Ingreso_Percapita=$request->ingresoPer;
    $nuevoAlumno->Telefono_Trabajo=$request->telTrabajo;

     if ($request->tipo_attach=='a') { 
        
        
        $nuevoAlumno->Contacto=$nuevoAlumno->Persona_Autorizada;
        $nuevoAlumno->Parentesco_Contacto=$nuevoAlumno->Parentesco_Autorizada;
        $nuevoAlumno->Tel_Contacto=$nuevoAlumno->Telefono_Autorizada;

       
    }

    else {
        
    $nuevoAlumno->Contacto=$request->nombreContact;
    $nuevoAlumno->Parentesco_Contacto=$request->parentescoContact;
    $nuevoAlumno->Tel_Contacto=$request->telcontact;

    }
  

    $nuevoAlumno->update();
    
    return Redirect::to('lista');

   }


}
