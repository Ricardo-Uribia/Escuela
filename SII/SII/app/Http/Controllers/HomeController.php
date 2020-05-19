<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::User();
       
        if ($user->role=='1') {
        
            return redirect ('user/admin'); 
        
        }elseif ($user->role=='2') {
            
            return redirect ('user/profe'); 

        }elseif ($user->role=='3') {

            return redirect ('user/director'); 

        }elseif ($user->role=='4') {

            return redirect ('user/alumno'); 

        }elseif ($user->role=='5') {
           
            return redirect ('user/cajero'); 
        }
   
    }
}
