<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\KasController;
use App\Models\ProdukUMKM;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Kas;
use App\Models\UserUMKM;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $product = ProdukUMKM::find($request->product_id);
        // $cek = $request->validate([
        //     'transaction_id' => 'required',
        //     'product_id' => 'required',
        //     'qty' => 'required|integer',
        //     'price' => 'required|integer',
        // ]);
        // dd($cek);
        $dtl = TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty, 
            'price' => $product->price,
            'sub_total' => $product->price * $request->qty
        ]);
        
        // $dtl['sub_total'] = $product->price * $dtl->qty;
        // $dtl->sub_total = $product->price * $dtl->qty;

        // $trsdetail->save();
        // dd($dtl['sub_total']);
        // dd($dtl);
        // $pemasukan = Kas::find($request->id);

        $transaction->total_price += $dtl['sub_total']; //menambah total di transaksi
        $product->stock -= $dtl['qty']; //mengurangi stock di tbl produk
        $product->selling += $dtl['qty'];
        // $pemasukan->pemasukan += $transaction->total_price;
        $product->save();
        $transaction->save();
        // $pemasukan->save();

        return redirect()->route('transaction.show', $transaction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = TransactionDetail::find($id);

        $produk = ProdukUMKM::find($item->product_id);
        // dd($produk);
        $transaction = Transaction::with(['details'])->findOrFail($item->transaction_id);

        $transaction->total_price -= $item->sub_total;
        $produk->stock += $item->qty;
        $produk->selling -= $item->qty;

        $transaction->save();
        $produk->save();
        $item->delete();
        
        return redirect()->route('transaction.show', $transaction->id);
    }

    public function search(Request $request)
    {   
        $query = $request->input('query');
        $items = ProdukUMKM::where('name', 'LIKE', '%'. $query .'%')->get();

        $items = [];

        foreach($items as $item)
        {
            $results[] = [
                'name' => $item->name,
                'price' => $item->price
            ];
        }

        return response()->json($items);
    }
}
