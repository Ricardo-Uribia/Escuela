<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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
            $empleado = Empleado::where('idEmpleado', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->orWhere('nombreProfesor', 'LIKE', "%$keyword%")
                ->orWhere('txtPaterno', 'LIKE', "%$keyword%")
                ->orWhere('txtMaterno', 'LIKE', "%$keyword%")
                ->orWhere('fechaNacimiento', 'LIKE', "%$keyword%")
                ->orWhere('estado_id', 'LIKE', "%$keyword%")
                ->orWhere('municipioNacimiento', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('claveCiudadana', 'LIKE', "%$keyword%")
                ->orWhere('estadoCivil', 'LIKE', "%$keyword%")
                ->orWhere('domicilio', 'LIKE', "%$keyword%")
                ->orWhere('Estado_Actual_ID', 'LIKE', "%$keyword%")
                ->orWhere('municipioActual', 'LIKE', "%$keyword%")
                ->orWhere('ciudad', 'LIKE', "%$keyword%")
                ->orWhere('cp', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('celular', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('numeroSeguroSocial', 'LIKE', "%$keyword%")
                ->orWhere('notasDescripcion', 'LIKE', "%$keyword%")
                ->orWhere('numEmpleado', 'LIKE', "%$keyword%")
                ->orWhere('sueldo', 'LIKE', "%$keyword%")
                ->orWhere('StatusActual', 'LIKE', "%$keyword%")
                ->orWhere('fecha_Ingreso', 'LIKE', "%$keyword%")
                ->orWhere('fecha_baja', 'LIKE', "%$keyword%")
                ->orWhere('departamento', 'LIKE', "%$keyword%")
                ->orWhere('cargo', 'LIKE', "%$keyword%")
                ->orWhere('contrato', 'LIKE', "%$keyword%")
                ->orWhere('cedulaFiscal', 'LIKE', "%$keyword%")
                ->orWhere('departamentoAnterior', 'LIKE', "%$keyword%")
                ->orWhere('cargoAnterior', 'LIKE', "%$keyword%")
                ->orWhere('empresaanterior', 'LIKE', "%$keyword%")
                ->orWhere('institucionAcademica', 'LIKE', "%$keyword%")
                ->orWhere('nivelEstudio', 'LIKE', "%$keyword%")
                ->orWhere('carrera', 'LIKE', "%$keyword%")
                ->orWhere('titulado', 'LIKE', "%$keyword%")
                ->orWhere('cedula', 'LIKE', "%$keyword%")
                ->orWhere('maestria', 'LIKE', "%$keyword%")
                ->orWhere('nombreMaestria', 'LIKE', "%$keyword%")
                ->orWhere('institucionMaestria', 'LIKE', "%$keyword%")
                ->orWhere('tituladoMaestria', 'LIKE', "%$keyword%")
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
                ->orWhere('cedulaPosDoctorado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $empleado = Empleado::latest()->paginate($perPage);
        }

        return view('admin.empleados.administrativos.mostraEmple', compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.empleados.administrativos.crearEmpleado');
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

        return redirect('empleado')->with('flash_message', 'Empleado added!');
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
        //$state = Estado::all();
        return view('admin.empleados.administrativos.show');//->with(compact('state'));
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

        return view('admin.empleados.administrativos.editEmpleado', compact('empleado'));
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

        return redirect('empleado')->with('flash_message', 'Empleado updated!');
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

        return redirect('empleado')->with('flash_message', 'Empleado deleted!');
    }
}
