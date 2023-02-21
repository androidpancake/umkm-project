@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <!-- Recent Activity -->
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card shadow">
        <div class="card-header">
            <strong class="card-title">Daftar Gambar Produk {{ Auth::user()->namaumkm }}</strong>
            <a href="{{ route('gallery.create') }}" class="btn btn-primary float-right" type="button">Tambahkan Gambar</a>

        </div>
        <div class="card-body my-n2">
            <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                <th>Gambar</th>
                <th>Produk ID</th>
                <th>Nama produk</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($items as $data)
                <tr>
                    <td>
                        <img src="{{ asset('products/'.$data->image) }}" style="width: 300px" alt="">
                    </td>
                    <td>{{ $data->product_id }}</td>
                    <td>{{ $data->product->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('gallery.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('gallery.destroy', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
                <!-- <div class="alert alert-danger">
                    Data tidak tersedia
                </div> -->
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
