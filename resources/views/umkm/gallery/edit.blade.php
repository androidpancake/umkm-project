@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-md-6">
        <!-- foto produk -->
        <img src="{{ asset('products/'.$data->image) }}" alt="" style="width: 75%;">
    </div>
    <div class="col-md-6">
        <!-- form -->
        <form action="{{ route('gallery.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')   
            <div class="form-group">
                <h5>{{ $data->product->name }}</h5>
                <label>ID</label>
                <input type="text" name="product_id" class="form-control" value="{{ $data->product->id }}" readonly>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection