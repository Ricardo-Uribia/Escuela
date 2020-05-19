<?php

namespace App\Http\Controllers\Magaly;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

class MagalyController extends Controller
{
    public function index(){
     $usuario = Auth::user();
	return view('home',['usuario' => $usuario]);
	
   }
}
