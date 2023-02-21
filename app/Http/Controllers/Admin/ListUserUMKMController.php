<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserUMKM;
use Illuminate\Support\Facades\Auth;

class ListUserUMKMController extends Controller
{
    // public function index(){
    //     if(! Auth::user()){
    //         return redirect()->route('admin.login');
    //     }
    // }
    public function index(){
        $title = 'Daftar UMKM';
        $datauserUMKM = UserUMKM::all();

        return view('admin.listuserumkm', compact('datauserUMKM'))->with('title', $title);
    }

    public function status(Request $request, $id){
        $data = UserUMKM::find($id);
        if($data->status == 0){
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();

        return redirect()->route('admin.daftarumkm')->with('message', $data->name. ' Status telah berhasil diganti');
    }

    public function show($id)
    {
        $title = 'Profil UMKM';
        $data = UserUMKM::findOrFail($id);
        return view('admin.profileumkm', compact('data'))->with('title', $title);
    }
}
