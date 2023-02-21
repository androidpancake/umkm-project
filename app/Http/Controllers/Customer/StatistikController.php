<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ProdukUMKM;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        $title = 'Statistik';
        $produklaris = ProdukUMKM::where('userumkm_id', auth()->id())->orderBy('selling', 'desc')->get();
        $produkterjual = ProdukUMKM::where('userumkm_id', auth()->id())->select('selling')->count();
        $pendapatan = Transaction::where('userumkm_id', auth()->id())->sum('total_price');
        // dd($produklaris);
        return view('umkm.statistik.index', [
            'bestselling' => $produklaris,
            'produkterjual' => $produkterjual,
            'pendapatan' => $pendapatan
        ])->with('title', $title);
    }
}
