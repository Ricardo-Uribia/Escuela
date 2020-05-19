<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Planed;
use App\Models\Preguntased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntasedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
public function preguntas($id)
    {
     /*   
     $plan=DB::table('e_preguntased as g')
            ->Join('e_planed as n', 'g.idplaned', '=', 'g.idplaned')
            ->select('g.numero','g.claveplaned','g.clavepregunta', 'g.preguntas', 
                'n.idplaned', 'g.idpreguntaed')
            ->where('g.idpreguntaed','=', $id)
            ->get();*/


           $plan=Preguntased::where('idplaned','=',$id)->get();
            
       return view('partials.evaluaciondocente.preguntased.preguntasED',['plan' => $plan]);

    }


    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $preguntased = Preguntased::where('idpreguntaed', 'LIKE', "%$keyword%")
                ->orWhere('idplaned', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->orWhere('clavepregunta', 'LIKE', "%$keyword%")
                ->orWhere('preguntas', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $preguntased = Preguntased::latest()->paginate($perPage);
        }


        return view('partials.evaluaciondocente.preguntased.index',['preguntased' => $preguntased], compact('preguntased'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        $preguntas = Preguntased::all();
        return view('partials.evaluaciondocente.preguntased.create',['preguntas' => $preguntas]);
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
        
        Preguntased::create($requestData);

        return redirect('preguntased')->with('flash_message', 'Preguntased added!');
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
        $preguntased = Preguntased::findOrFail($id);

        return view('partials.evaluaciondocente.preguntased.show', compact('preguntased'));
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
        $preguntased = Preguntased::findOrFail($id);

        return view('partials.evaluaciondocente.preguntased.edit', compact('preguntased'));
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
        
        $preguntased = Preguntased::findOrFail($id);
        $preguntased->update($requestData);

        return redirect('preguntased')->with('flash_message', 'Preguntased updated!');
    }


    /*public function search(Request $request){
        $preguntased= Preguntased::where('claveplaned','like','%'.$request->claveplaned.'%')->get();
        return redirect('preguntased',compact('preguntased'));
    }*/




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Preguntased::destroy($id);

        return redirect('preguntased')->with('flash_message', 'Preguntased deleted!');
    }

   

}
