@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col">
        <!-- form -->
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf   
            <input type="hidden" name="userumkm_id" value="{{ Auth::user()->id }}">
            
            <div class="form-group">
                <label for="my-select">Produk</label>
                <select id="my-select" class="form-control" name="product_id">
                    @foreach($product as $data)
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection