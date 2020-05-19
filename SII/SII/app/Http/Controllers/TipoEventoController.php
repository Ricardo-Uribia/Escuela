<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
  
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tipoevento = TipoEvento::where('idEvento', 'LIKE', "%$keyword%")
                ->orWhere('TipoEvento', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipoevento = TipoEvento::latest()->paginate($perPage);
        }

        return view('tipo-evento.index', compact('tipoevento'));
    }

  
    public function create()
    {
        return view('tipo-evento.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        TipoEvento::create($requestData);

        return redirect('tipo-evento')->with('info', 'Tipo Evento Guardado con exito!');
    }


    public function show($id)
    {
        $tipoevento = TipoEvento::findOrFail($id);

        return view('tipo-evento.show', compact('tipoevento'));
    }


    public function edit($id)
    {
        $tipoevento = TipoEvento::findOrFail($id);

        return view('tipo-evento.edit', compact('tipoevento'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $tipoevento = TipoEvento::findOrFail($id);
        $tipoevento->update($requestData);

        return redirect('tipo-evento')->with('info', 'Tipo Evento actualizado con exito!');
    }


    public function destroy($id)
    {
        TipoEvento::destroy($id);

        return redirect('tipo-evento')->with('info', 'Tipo Eliminado con exito!');

        
    }
}
