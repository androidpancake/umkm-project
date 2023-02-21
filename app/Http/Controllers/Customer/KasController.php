<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Transaction;
use App\Models\UserUMKM;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('userumkm_id', auth()->id())->get();
        $pemasukan = Transaction::where('userumkm_id', auth()->id())->sum('total_price');
        return view('umkm.kas.index', [
            'pemasukan' => $pemasukan,
            'transaksi' => $transaction
        ]);
    }

    public function reset($id)
    {
        $data = [
            'pendapatan' => 0
        ];
        $user = UserUMKM::find($id);
        // dd($data);
        $user->update($data);

        return redirect()->route('kas.index');
    }
}
