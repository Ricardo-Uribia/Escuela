<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivos;
use App\Models\Alumnos;
use Illuminate\Support\Facades\Redirect;

class ArchivosController extends Controller
{
    public function multifileupload()
    {
        $alum = Alumnos::FindOrFail($id);

    	return view('partials.alumnos.updateAlumno', compact('alum'));
    }

    public function create(Request $request)
    {


    }

    public function store(Request $request)
    {
    	//obtenemos el campo file definido en el formulario
       
       
       if ($request->file('file')){
         $file = $request->file('file');
         $nombre = $file->getClientOriginalName();
         $file->move(storage_path().'/storage/documentos/',$nombre);
       }


       else {
        $nombre = "";
       }
 
       //obtenemos el nombre del archivo
       
     

 
       //indicamos que queremos guardar un nuevo archivo en el disco local
      


     
 $archivo = new Archivos;

 $archivo->nombre=$nombre;
 $archivo->descripcion=$request->get('descripcion');
 $archivo->recibido=$request->get('recibido');
 $archivo->copia=$request->get('copia');
 $archivo->validado=$request->get('validado');
 $archivo->fecha_recepcion=$request->get('recepcion');
 $archivo->fecha_prestamo=$request->get('prestamo');
 $archivo->devolucion=$request->get('devolucion');
 $archivo->fecha_devolucion=$request->get('fechaDev');
 $archivo->observaciones=$request->get('observaciones');
 $archivo->alumno_id=$request->get('idAlumno');
 
 $archivo->save();

       return redirect('crear/alumno/'.$request->get('idAlumno'));
           


    }

    public function update(Request $request, $id)
    {

      if ($request->file('file')){
         $file = $request->file('file');
         $nombre = $file->getClientOriginalName();
         $file->move(public_path().'/storage',$nombre);
       }


       else {
        $nombre = "";
       }
 

         $documentos = Archivos::FindOrFail($id);

          $documentos->nombre=$nombre;

        $documentos->recibido = $request->recibido;
        $documentos->copia = $request->copia;
        $documentos->validado = $request->validado;
        $documentos->fecha_prestamo = $request->prestamo;
        $documentos->devolucion = $request->devolucion;
        $documentos->fecha_devolucion = $request->fechaDev;
        $documentos->observaciones = $request->observaciones;

            $documentos->save();
        return Redirect::to('lista');



    }

    public function show()
    {

    }

    public function destroy()
    {

    }
}
