<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //login
    public function login(){
        return view('auth.login');
    }

    public function guard(){
        return Auth::guard('admin');
    }

    public function login_action(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('webadmin')->attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'password' => 'Email atau password salah'
        ]);
    }

    //logout
    public function logout(Request $request){

        Auth::guard('webadmin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
