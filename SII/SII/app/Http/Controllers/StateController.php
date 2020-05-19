<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Town;	

class StateController extends Controller
{
     public function index()
    {
    	$state = Estado::all('NOMBRE', 'id');
    	return view('index', compact('state'));
    }

    public function getTowns(Request $request, $id){

    	if ($request->ajax()) {
    		$towns = Town::towns($id);
    		return response()->json($towns);
    	}
    }
}
