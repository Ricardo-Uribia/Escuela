<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\grupos_villa;
use Illuminate\Http\Request;

class grupos_villasController extends Controller
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
            $grupos_villas = grupos_villa::where('idgrupo_villas', 'LIKE', "%$keyword%")
                ->orWhere('idCiclo', 'LIKE', "%$keyword%")
                ->orWhere('nombreVilla', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('cupoMaximo', 'LIKE', "%$keyword%")
                ->orWhere('responsableVilla', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $grupos_villas = grupos_villa::latest()->paginate($perPage);
        }

        return view('grupos_villas.index', compact('grupos_villas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('grupos_villas.create');
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
        
        grupos_villa::create($requestData);

        return redirect('grupos_villas')->with('flash_message', 'grupos_villa added!');
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
        $grupos_villa = grupos_villa::findOrFail($id);

        return view('grupos_villas.show', compact('grupos_villa'));
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
        $grupos_villa = grupos_villa::findOrFail($id);

        return view('grupos_villas.edit', compact('grupos_villa'));
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
        
        $grupos_villa = grupos_villa::findOrFail($id);
        $grupos_villa->update($requestData);

        return redirect('grupos_villas')->with('flash_message', 'grupos_villa updated!');
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
        grupos_villa::destroy($id);

        return redirect('grupos_villas')->with('flash_message', 'grupos_villa deleted!');
    }
}
