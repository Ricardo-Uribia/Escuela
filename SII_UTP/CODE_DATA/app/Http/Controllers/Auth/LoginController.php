<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function doLogin(Request $r){


        if(Auth::attempt(['email' => $r->email, "password" => $r->password])){
            $user = Auth::user();        
            switch ($user->role) {
                case 1:                    
                    return redirect('/admin/index');
                    break;
                case 2:
                    Auth::logout();
                    return redirect('/');
                    //return redirect('/p/index');
                    break;
                case 3:
                    Auth::logout();
                    return redirect('/');
                    //return redirect('/a/index');
                    break;
                default:
                   Auth::logout();
                   return redirect('/');
                    break;
            }
        }else{
            return redirect('/');
        }

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
