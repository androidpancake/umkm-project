<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserUMKM;
use App\Models\Transaction;

class DashboardAdminController extends Controller
{
    public function index(){
        $UMKMapproval = UserUMKM::where('status', 0)->count();
        $UMKMapproved = UserUMKM::where('status', 1)->count();

        $userUMKM = UserUMKM::all()->count();
        $pendapatanUMKM = Transaction::sum('total_price');
        $pendapatanAllUMKM = Transaction::join('userumkm', 'userumkm.id', '=', 'transaction.userumkm_id')
        ->selectRaw('sum(total_price) as total_price, namaumkm')
        ->groupBy('userumkm.id')
        ->get();
        // dd($pendapatanAllUMKM);
        $pendapatan = UserUMKM::all();
        foreach($pendapatan as $data)
        {
            $datapendapatan[] = [
                'namaumkm' => $data->namaumkm,
                'pendapatan' => $data->pendapatan
            ];
        }
        $data['datapendapatan'] = ($datapendapatan);
        // dd($datapendapatan);
        return view('admin.dashboard', [
            'UMKMapproval' => $UMKMapproval,
            'UMKMapproved' => $UMKMapproved,
            'userUMKM' => $userUMKM,
            'pendapatanUMKM' => $pendapatanUMKM,
            'chartpendapatanUMKM' => $pendapatanAllUMKM,
            'datapendapatan' => ($datapendapatan),
        ]);
    }

    public function listuserUMKM(){
        $datauserUMKM = UserUMKM::all();

        return view('admin.listuserumkm', compact('datauserUMKM'));
    }
}
