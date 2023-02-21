@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- form -->
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            @method('POST')
            <!-- <input type="hidden" name="userumkm_id" value="{{ Auth::user()->id }}"> -->
            <div class="form-group">
                <label>Nama produk</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="category_id" class="form-control">
                    @foreach($category as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection