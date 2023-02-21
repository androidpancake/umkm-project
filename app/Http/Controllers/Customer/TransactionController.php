<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\ProdukUMKM;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\UserUMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transaksi';
        $items = Transaction::with([
            'details', 'userumkm'
        ])->where('userumkm_id', auth()->id())->get();


        return view('umkm.transaction.index', compact('items'))->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $transaction = Transaction::create([
            'userumkm_id' => Auth::user()->id,
            'total_price' => 0,
            'date' => now()
        ]);

        return redirect()->route('transaction.show', $transaction->id);
    }

    public function process(Request $request, $id)
    {
        // $transaction = Transaction::with(['details'])->find($id);
        
        // $detail = $request->validate([
        //     'transaction_id' => 'required',
        //     'product_id' => 'required',
        //     'qty' => 'required|integer',
        //     'price' => 'required|integer',
        // ]);

        // $dtl = TransactionDetail::create([
        //     // $detail['transaction_id'] => $transaction->id,
        //     // $detail['product_id'],
        //     // $detail['qty'],
        //     // $detail['price'] => $transaction->product->price
        //     $detail
        // ]);
        // dd($dtl);
        // $dtl->sub_total = $dtl->price * $dtl->qty;

        // // $trsdetail->save();
        // // dd($dtl['sub_total']);
        // $transaction->total_price += $dtl->sub_total; //bisa dipindah di show

        // $transaction->save();

        // return redirect()->route('transaction.show', $transaction->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Data Transaksi';
        $product = ProdukUMKM::where([
            ['userumkm_id', auth()->id()],
            ['stock', '>', 0]
        ])->get();

        $items = Transaction::with([
            'userumkm', 'details' //untuk get isi detail transaksi sama user umkm
        ])->findOrFail($id);
        
        // $subtotal = TransactionDetail::sum(DB::raw('qty * price'))->find($id);
        // $total = TransactionDetail::with(['product'])->where('transaction_id', $items->id)->sum($cart->price * $cart->qty)->get();
        $total = $items->total_price;
        return view('umkm.transaction.edit', [
            'items' => $items,
            'product' => $product,
            'total' => $total
            // 'subtotal' => $subtotal,
        ])->with('title', $title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($user);
        $data = $request->all();
        // $data['userumkm_id'] = $request->userumkm_id;
        // $data['date'] = $request->date;
        // $data['total_price'] = $request->total_price;
        // dd($data['total_price']);
        // dd($data);
        $transaction = Transaction::findOrFail($id);
        // $user =  UserUMKM::find(auth()->id());
        
        // dd($kas);
        // $user->pendapatan += $data['total_price'];
        $transaction->update($data);
        // $user->save();
        // $kas->save();

        return redirect()->route('transaction.show', $transaction->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = UserUMKM::find(auth()->id());
        $item = Transaction::findOrFail($id);

        // $user->pendapatan -= $item->total_price;
        // $user->save();
        $item->delete();


        return redirect()->route('transaction.index');
    }

    public function reset($id)
    {
        $data = [
            'total_price' => 0
        ];


        $transaction = Transaction::findOrFail($id);
        $transaction->update($data);

        return redirect()->route('transaction.show', $transaction->id);
    }
}
