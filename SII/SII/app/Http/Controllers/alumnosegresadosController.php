<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\alumnosegresado;
use Illuminate\Http\Request;

class alumnosegresadosController extends Controller
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
            $alumnosegresados = alumnosegresado::where('idalumnosegresados', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('carrera', 'LIKE', "%$keyword%")
                ->orWhere('matricula', 'LIKE', "%$keyword%")
                ->orWhere('grupo', 'LIKE', "%$keyword%")
                ->orWhere('estatus', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $alumnosegresados = alumnosegresado::latest()->paginate($perPage);
        }

        return view('alumnosegresados.index', compact('alumnosegresados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('alumnosegresados.create');
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
        
        alumnosegresado::create($requestData);

        return redirect('alumnosegresados')->with('flash_message', 'alumnosegresado added!');
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
        $alumnosegresado = alumnosegresado::findOrFail($id);

        return view('alumnosegresados.show', compact('alumnosegresado'));
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
        $alumnosegresado = alumnosegresado::findOrFail($id);

        return view('alumnosegresados.edit', compact('alumnosegresado'));
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
        
        $alumnosegresado = alumnosegresado::findOrFail($id);
        $alumnosegresado->update($requestData);

        return redirect('alumnosegresados')->with('flash_message', 'alumnosegresado updated!');
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
        alumnosegresado::destroy($id);

        return redirect('alumnosegresados')->with('flash_message', 'alumnosegresado deleted!');
    }

    
}
