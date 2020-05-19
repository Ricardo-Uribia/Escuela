<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Actividade;
use App\Models\Alumnos;
use App\CatalogoEvento;
use Illuminate\Http\Request;

class actividadesController extends Controller
{
 
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $actividades = actividade::where('idactividades', 'LIKE', "%$keyword%")
                ->orWhere('evento', 'LIKE', "%$keyword%")
                ->orWhere('grupo', 'LIKE', "%$keyword%")
                ->orWhere('categoria', 'LIKE', "%$keyword%")
                ->orWhere('alumno', 'LIKE', "%$keyword%")
                ->orWhere('carrera', 'LIKE', "%$keyword%")
                ->orWhere('edad', 'LIKE', "%$keyword%")
                ->orWhere('cuatrimestre', 'LIKE', "%$keyword%")
                ->orWhere('fechaNacimineto', 'LIKE', "%$keyword%")
                ->orWhere('sexo', 'LIKE', "%$keyword%")
                ->orWhere('municipio', 'LIKE', "%$keyword%")
                ->orWhere('colonia', 'LIKE', "%$keyword%")
                ->orWhere('CP', 'LIKE', "%$keyword%")
                ->orWhere('estado', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('correo', 'LIKE', "%$keyword%")
                ->orWhere('padeceEnfermedad', 'LIKE', "%$keyword%")
                ->orWhere('especificar1', 'LIKE', "%$keyword%")
                ->orWhere('tomaMedicamento', 'LIKE', "%$keyword%")
                ->orWhere('especificar2', 'LIKE', "%$keyword%")
                ->orWhere('padeceAlergia', 'LIKE', "%$keyword%")
                ->orWhere('especificar3', 'LIKE', "%$keyword%")
                ->orWhere('tipoSangre', 'LIKE', "%$keyword%")
                ->orWhere('numImss', 'LIKE', "%$keyword%")
                ->orWhere('umf', 'LIKE', "%$keyword%")
                ->orWhere('nomPadre', 'LIKE', "%$keyword%")
                ->orWhere('nomMadre', 'LIKE', "%$keyword%")
                ->orWhere('numContacto', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $actividades = actividade::latest()->paginate($perPage);
        }

      

        return view('actividades.index', compact('actividades'));
    }

 
    public function create()
    {
        return view('actividades.create');
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        actividade::create($requestData);

        return redirect('catalogo-evento')->with('info', 'Registro Guardado con exito!');
    }

    public function show($id)
    {
        $actividade = actividade::findOrFail($id);

        return view('actividades.show', compact('actividade'));
    }


    public function edit($id)
    {
        $actividade = actividade::findOrFail($id);

        return view('actividades.edit', compact('actividade'));
    }

   
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $actividade = actividade::findOrFail($id);
        $actividade->update($requestData);

        return redirect('catalogo-evento')->with('info', 'Registro Actualizado con exito!');
    }

  
    public function destroy($id)
    {
              
        actividade::destroy($id);
        return redirect('eventoacti')->with('info', 'Registro Eliminado con exito!');
    }


}
