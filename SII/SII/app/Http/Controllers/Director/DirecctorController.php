<?php

namespace App\Http\Controllers\Director;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DirecctorController extends Controller
{
    public function index(){

	return view('partials.principal');
	
   }
}
