<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
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
            $empleados = Empleado::where('idEmpleado', 'LIKE', "%$keyword%")
                ->orWhere('paterno', 'LIKE', "%$keyword%")
                ->orWhere('materno', 'LIKE', "%$keyword%")
                ->orWhere('nombres', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('fechaNacimiento', 'LIKE', "%$keyword%")
                ->orWhere('estado_id', 'LIKE', "%$keyword%")
                ->orWhere('municipioNacimiento', 'LIKE', "%$keyword%")
                ->orWhere('domicilio', 'LIKE', "%$keyword%")
                ->orWhere('Estado_Actual_ID', 'LIKE', "%$keyword%")
                ->orWhere('municipioActual', 'LIKE', "%$keyword%")
                ->orWhere('estadoCivil', 'LIKE', "%$keyword%")
                ->orWhere('numeroSeguroSocial', 'LIKE', "%$keyword%")
                ->orWhere('cedulaFiscal', 'LIKE', "%$keyword%")
                ->orWhere('claveCiudadana', 'LIKE', "%$keyword%")
                ->orWhere('cp', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('celular', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('fecha_ingreso', 'LIKE', "%$keyword%")
                ->orWhere('fecha_baja', 'LIKE', "%$keyword%")
                ->orWhere('departamento', 'LIKE', "%$keyword%")
                ->orWhere('cargo', 'LIKE', "%$keyword%")
                ->orWhere('contrato', 'LIKE', "%$keyword%")
                ->orWhere('sueldo', 'LIKE', "%$keyword%")
                ->orWhere('nivelEstudios', 'LIKE', "%$keyword%")
                ->orWhere('carrera', 'LIKE', "%$keyword%")
                ->orWhere('titulado', 'LIKE', "%$keyword%")
                ->orWhere('institucionEstudios', 'LIKE', "%$keyword%")
                ->orWhere('cedulaProfecional', 'LIKE', "%$keyword%")
                ->orWhere('notasDescripcion', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('StatusActual', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('departamentoAnterior', 'LIKE', "%$keyword%")
                ->orWhere('cargoAnterior', 'LIKE', "%$keyword%")
                ->orWhere('empresaAnterior', 'LIKE', "%$keyword%")
                ->orWhere('maestria', 'LIKE', "%$keyword%")
                ->orWhere('nombreMaestria', 'LIKE', "%$keyword%")
                ->orWhere('institucionMaestria', 'LIKE', "%$keyword%")
                ->orWhere('tituloMaestria', 'LIKE', "%$keyword%")
                ->orWhere('cedulaMaestria', 'LIKE', "%$keyword%")
                ->orWhere('doctorado', 'LIKE', "%$keyword%")
                ->orWhere('nombreDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('institucionDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('tituloDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('cedulaDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('postDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('nombrePostDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('institucionPostDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('tituloPostDoctorado', 'LIKE', "%$keyword%")
                ->orWhere('cedulaPostDoctorado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empleados = Empleado::latest()->paginate($perPage);
        }

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('empleados.create');
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
        
        Empleado::create($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado added!');
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
        $empleado = Empleado::findOrFail($id);

        return view('empleados.show', compact('empleado'));
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
        $empleado = Empleado::findOrFail($id);

        return view('empleados.edit', compact('empleado'));
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
        
        $empleado = Empleado::findOrFail($id);
        $empleado->update($requestData);

        return redirect('empleados')->with('flash_message', 'Empleado updated!');
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
        Empleado::destroy($id);

        return redirect('empleados')->with('flash_message', 'Empleado deleted!');
    }
}
