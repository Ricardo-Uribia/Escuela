<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Criterio;
use Illuminate\Http\Request;

class CriterioController extends Controller
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
            $criterio = Criterio::where('idCriterio', 'LIKE', "%$keyword%")
                ->orWhere('clave_crit', 'LIKE', "%$keyword%")
                ->orWhere('criterio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $criterio = Criterio::latest()->paginate($perPage);
        }

        return view('criterio.index', compact('criterio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('criterio.create');
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
        
        Criterio::create($requestData);

        return redirect('criterio')->with('flash_message', 'Criterio added!');
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
        $criterio = Criterio::findOrFail($id);

        return view('criterio.show', compact('criterio'));
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
        $criterio = Criterio::findOrFail($id);

        return view('criterio.edit', compact('criterio'));
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
        
        $criterio = Criterio::findOrFail($id);
        $criterio->update($requestData);

        return redirect('criterio')->with('flash_message', 'Criterio updated!');
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
        Criterio::destroy($id);

        return redirect('criterio')->with('flash_message', 'Criterio deleted!');
    }
}
