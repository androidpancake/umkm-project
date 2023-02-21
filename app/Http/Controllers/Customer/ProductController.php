<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProdukUMKM;
use App\Models\Stock;
// use App\Models\UserUMKM;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Produk';
        $items = ProdukUMKM::with([
            'userumkm', 'category', 'gallery'
        ])->where('userumkm_id', auth()->id())->get();
  
        return view('umkm.product.index', [
            'items' => $items
        ])->with('title', $title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Buat Data Produk';
        $category = Category::where('userumkm_id', auth()->id())->get();
        return view('umkm.product.create', [
            'category' => $category
        ])->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['userumkm_id'] = Auth::user()->id;
        ProdukUMKM::create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data Produk';
        $data = ProdukUMKM::with(['gallery'])->where('id', $id)->first();
        $category = Category::where('userumkm_id', auth()->id())->get();
        return view('umkm.product.show', compact('data', 'category'))->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $item = ProdukUMKM::find($id);
        $item->update($data);
        return redirect()->route('product.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProdukUMKM::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}
