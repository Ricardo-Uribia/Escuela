<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Planed;
use App\Models\Preguntased;
use Illuminate\Http\Request;


class PlanedController extends Controller
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
            $planed = Planed::where('idplaned', 'LIKE', "%$keyword%")
                ->orWhere('claveplaned', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $planed = Planed::latest()->paginate($perPage);
            
        }
        

        return view('partials.evaluaciondocente.planed.index', compact('planed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $preguntased = Preguntased::all();
        return view('partials.evaluaciondocente.planed.create',['preguntased' => $preguntased]);
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
        
        Planed::create($requestData);

        return redirect('planed')->with('flash_message', 'Planed added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
   /* public function show($id)
    {
        $planed = Planed::findOrFail($id);
     

        return view('partials.evaluaciondocente.planed.show', compact('planed'));
    }*/
    public function preguntased()
    {
        $preguntased = Preguntased::with('idplaned')->get();
        return view('partials.evaluaciondocente.preguntased.index',compact('preguntased'));
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
        $planed = Planed::findOrFail($id);
       
        return view('partials.evaluaciondocente.planed.edit', compact('planed'));
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
        
        $planed = Planed::findOrFail($id);
        $planed->update($requestData);

        return redirect('planed')->with('flash_message', 'Planed updated!');
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
        Planed::destroy($id);

        return redirect('planed')->with('flash_message', 'Planed deleted!');
    }
}
