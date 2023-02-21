<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserUMKM;
use Illuminate\Support\Facades\Hash;

class AuthUMKMController extends Controller
{
    // public function index(){
    //     return redirect()->route('dashboard');
    // }
    //login
    public function login(){
        return view('authumkm.login');
    }

    public function login_action(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with([
            'password' => 'Email atau password salah atau akun anda belum aktif'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('umkm.login-umkm');
    }
}
