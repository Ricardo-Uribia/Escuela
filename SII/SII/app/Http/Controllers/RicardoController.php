<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class RicardoController extends Controller
{
    public function ricardo()
    {
        return view ('indexseguimiento');
    }
    
    
    public function civico()
    {
        return view ('civico');
    }
    
    public function actividad()
    {
        return view ('actividades');
    }
    
    public function curso()
    {
        return view ('curso');
    }
    
    public function cultural()
    {
        return view ('cultural');
    }
    
    public function visita()
    {
        return view ('visita');
    }
    
    public function platica()
    {
        return view ('platica');
    }
}

