<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ProdukUMKM;
use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function approval(){
        return view('auth.approval');
    }

    public function dashboard(){
        $produk = ProdukUMKM::select('id')->where('userumkm_id', auth()->id())->count();
        $pendapatan = Transaction::where('userumkm_id', auth()->id())->sum('total_price');
        $counttransaksi = Transaction::where('userumkm_id', auth()->id())->count();
        $transaksi = Transaction::where('userumkm_id', auth()->id())->limit(5)->get();
        $chart = Transaction::selectRaw('sum(total_price) as total_price, date')->where('userumkm_id', auth()->id())->groupBy('date')->get();
        // dd($chart);
        // foreach($chart as $data)
        // {
        //     $datapendapatan[] = [
        //         'date' => $data->date,
        //         'total_price' => $data->total_price
        //     ];
        // }
        // $data['datapendapatan'] = ($datapendapatan);
        return view('umkm.dashboard', [
            // 'pendapatan' => ($datapendapatan),
            'chart' => $chart,
            'produk' => $produk,
            'counttransaksi' => $counttransaksi,
            'transaksi' => $transaksi,
            'pendapatan' => $pendapatan
        ]);
    }
}
