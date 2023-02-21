@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col">
        <!-- foto produk -->
        <div class="row mt-2">
        @forelse($data->gallery as $foto)
        <img src="{{ asset('products/'.$data->gallery->first()->image) }}" class="img-fluid" alt="">
        <div class="col mt-2">
            <img src="{{ asset('products/'.$foto->image) }}" class="img-fluid" alt="">
        </div>
        @empty
        <div class="col">
            <p>No image</p>
        </div>
        @endforelse
        </div>
    </div>
    <div class="col">
        <!-- form -->
        <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')   
            <input type="hidden" name="userumkm_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label>Nama produk</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
            </div>
            <div class="form-group">
                <label for="my-select">Kategori</label>
                <select id="my-select" class="form-control" name="category_id">
                    @forelse($category as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @empty
                        <option value="">Tidak ada data kategori</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <h6>{{ $data->price }}</h6>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <h6>{{ $data->stock }}</h6>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection