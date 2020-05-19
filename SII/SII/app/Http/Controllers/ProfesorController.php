<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
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
            $profesor = Profesor::where('idProfesor', 'LIKE', "%$keyword%")
                ->orWhere('idEmpleado', 'LIKE', "%$keyword%")
                ->orWhere('claveProfesor', 'LIKE', "%$keyword%")
                ->orWhere('horasDocencia', 'LIKE', "%$keyword%")
                ->orWhere('horasInvestigacion', 'LIKE', "%$keyword%")
                ->orWhere('horasAdmin', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $profesor = Profesor::latest()->paginate($perPage);
        }

        return view('profesor.index', compact('profesor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profesor.create');
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
        
        Profesor::create($requestData);

        return redirect('profesor')->with('flash_message', 'Profesor added!');
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
        $profesor = Profesor::findOrFail($id);

        return view('profesor.show', compact('profesor'));
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
        $profesor = Profesor::findOrFail($id);

        return view('profesor.edit', compact('profesor'));
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
        
        $profesor = Profesor::findOrFail($id);
        $profesor->update($requestData);

        return redirect('profesor')->with('flash_message', 'Profesor updated!');
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
        Profesor::destroy($id);

        return redirect('profesor')->with('flash_message', 'Profesor deleted!');
    }
}
