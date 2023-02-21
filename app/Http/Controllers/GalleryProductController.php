<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\GalleryProduct;
use App\Models\ProdukUMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Galeri Produk';
        $items = GalleryProduct::with(['product'])->where('userumkm_id', auth()->id())->get();

        return view('umkm.gallery.index', [
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
        $title = 'Buat Galeri Produk';
        $product = ProdukUMKM::where('userumkm_id', auth()->id())->get();

        return view('umkm.gallery.create', [
            'product' => $product
        ])->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();

        $data['image'] = uniqid(). '.'. ($request->file('image'))->getClientOriginalExtension();
        $request->image->move(public_path('products'), $data['image']);
        $data['userumkm_id'] = Auth::user()->id;
        
        GalleryProduct::create($data);

        return redirect()->route('gallery.index');
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
        $title = 'Edit Galeri Produk';
        $data = GalleryProduct::findOrFail($id);
        $product = ProdukUMKM::all();
        return view('umkm.gallery.edit', [
            'data' => $data,
            'product' => $product
        ])->with('title', $title);
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
        // $data = $request->validate([
        //     'product_id' => 'required|exists',
        //     'image' => 'nullable|image|mimes:jpeg,png|max:2048',
        // ]);
        $data = $request->all();

        if($request->hasFile('image'))
        {
            $data['image'] = uniqid(). '.'. ($request->file('image'))->getClientOriginalExtension();
            $request->image->move(public_path('products'), $data['image']);
        }
        
        // dd($data);

        $item = GalleryProduct::findOrFail($id);
        $item->update($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GalleryProduct::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery.index');
    }
}
