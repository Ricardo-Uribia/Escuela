<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\alumnos_villa;
use Illuminate\Http\Request;

class alumnos_villasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $alumnos_villas = alumnos_villa::where('idalumnos_villas', 'LIKE', "%$keyword%")
                ->orWhere('id_ciclo', 'LIKE', "%$keyword%")
                ->orWhere('idgrupo_villas', 'LIKE', "%$keyword%")
                ->orWhere('id_alumno', 'LIKE', "%$keyword%")
                ->orWhere('id_grupo', 'LIKE', "%$keyword%")
                ->orWhere('fechaIngreso', 'LIKE', "%$keyword%")
                ->orWhere('carrera', 'LIKE', "%$keyword%")
                ->orWhere('profesor', 'LIKE', "%$keyword%")
                ->orWhere('telefono_a', 'LIKE', "%$keyword%")
                ->orWhere('apellidoPaterno_a', 'LIKE', "%$keyword%")
                ->orWhere('apellidoMaterno_a', 'LIKE', "%$keyword%")
                ->orWhere('nombre_a', 'LIKE', "%$keyword%")
                ->orWhere('edad_a', 'LIKE', "%$keyword%")
                ->orWhere('fechaNacimiento_a', 'LIKE', "%$keyword%")
                ->orWhere('genero_a', 'LIKE', "%$keyword%")
                ->orWhere('direccion_a', 'LIKE', "%$keyword%")
                ->orWhere('localidad_a', 'LIKE', "%$keyword%")
                ->orWhere('municipio_a', 'LIKE', "%$keyword%")
                ->orWhere('estado_a', 'LIKE', "%$keyword%")
                ->orWhere('correo_electronico_a', 'LIKE', "%$keyword%")
                ->orWhere('telefono2', 'LIKE', "%$keyword%")
                ->orWhere('estado_civil', 'LIKE', "%$keyword%")
                ->orWhere('tiempo_viaje', 'LIKE', "%$keyword%")
                ->orWhere('costo_transporte', 'LIKE', "%$keyword%")
                ->orWhere('escuela_procedencia_a', 'LIKE', "%$keyword%")
                ->orWhere('Enfermedad_a', 'LIKE', "%$keyword%")
                ->orWhere('cual_enfermedad_a', 'LIKE', "%$keyword%")
                ->orWhere('discapacidad_a', 'LIKE', "%$keyword%")
                ->orWhere('cual_discapacidad_a', 'LIKE', "%$keyword%")
                ->orWhere('alergia_a', 'LIKE', "%$keyword%")
                ->orWhere('cual_alergia_a', 'LIKE', "%$keyword%")
                ->orWhere('medicina_a', 'LIKE', "%$keyword%")
                ->orWhere('cual_medicina_a', 'LIKE', "%$keyword%")
                ->orWhere('tipo_sangre_a', 'LIKE', "%$keyword%")
                ->orWhere('NSS_a', 'LIKE', "%$keyword%")
                ->orWhere('UMF_a', 'LIKE', "%$keyword%")
                ->orWhere('nombre_papa_a', 'LIKE', "%$keyword%")
                ->orWhere('ocupacion_a', 'LIKE', "%$keyword%")
                ->orWhere('telefono_papa_a', 'LIKE', "%$keyword%")
                ->orWhere('nombre_mama_a', 'LIKE', "%$keyword%")
                ->orWhere('ocupacion_mama_a', 'LIKE', "%$keyword%")
                ->orWhere('telefono_mama_a', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alumnos_villas = alumnos_villa::latest()->paginate($perPage);
        }

        return view('alumnos_villas.index', compact('alumnos_villas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('alumnos_villas.create');
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
        
        alumnos_villa::create($requestData);

        return redirect()->action('alumnos_villasController@create')->with('info', 'Registro guardado con exito!!');
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
        $alumnos_villa = alumnos_villa::findOrFail($id);

        return view('alumnos_villas.show', compact('alumnos_villa'));
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
        $alumnos_villa = alumnos_villa::findOrFail($id);

        return view('alumnos_villas.edit', compact('alumnos_villa'));
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
        
        $alumnos_villa = alumnos_villa::findOrFail($id);
        $alumnos_villa->update($requestData);

        return redirect('alumnos_villas')->with('flash_message', 'alumnos_villa updated!');
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
        alumnos_villa::destroy($id); 

        return redirect('alumnos_villas')->with('flash_message', 'alumnos_villa deleted!');
    }

    //public function eliminar($id)
    //{
        //alumnos_villa::destroy($id);

        //return redirect()->action('catalogo_villasController@registroVilla')->with('info', 'Alumno Eliminado');
    //}
}
