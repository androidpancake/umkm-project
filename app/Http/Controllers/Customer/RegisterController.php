<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserUMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(){
        return view('authumkm.register');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'namaumkm' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'bidangusaha' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new UserUMKM([
            'name' => $request->name,
            'namaumkm' => $request->namaumkm,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'bidangusaha' => $request->bidangusaha,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->save();

        return redirect()->route('umkm.login-umkm')->with('success', 'Registrasi berhasil. Silakan login');
    }
}
