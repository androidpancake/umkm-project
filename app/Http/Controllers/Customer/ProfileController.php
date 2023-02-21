<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserUMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index(){
        $pendapatan = Transaction::where('userumkm_id', auth()->id())->sum('total_price');
        // dd($pendapatan);
        $user = UserUMKM::all()->find(1);

        return view('umkm.profile.profile', compact('user', 'pendapatan'));
    }

    public function umkm()
    {
        $pendapatan = Transaction::where('userumkm_id', auth()->id())->sum('total_price');
        return view('umkm.profile.umkm', compact('pendapatan'));
    }

    public function security()
    {
        return view('umkm.profile.security');
    }

    public function update_profile(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
        
        if($request->hasFile('avatar')){
            $data['avatar'] = uniqid(). '.'. ($request->file('avatar'))->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $data['avatar']);
        }
        // dd($data);
        $user = UserUMKM::find($id);

        $user->update($data);
        
        return redirect()->back()->with('success', 'Profil Berhasil Terupdate!');
    }

    public function update_umkm(Request $request, $id)
    {
        $data = $request->validate([
            'namaumkm' => 'required',
            'deskripsi' => 'nullable|max:255',
            'alamat' => 'required',
            'bidangusaha' => 'required',
        ]);
        
        // dd($data);
        $user = UserUMKM::find($id);

        $user->update($data);
        
        return redirect()->back()->with('success', 'Profil Berhasil Terupdate!');
    }

    public function update_password(Request $request, $id)
    {   
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
    
        $user = UserUMKM::find($id);
        $current_password = $user->password;
    
        if (Hash::check($request->current_password, $current_password)) {
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->back()->with('success', 'Your password has been updated successfully!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }
    }
}
