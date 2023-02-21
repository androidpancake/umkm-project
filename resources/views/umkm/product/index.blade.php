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
            <strong class="card-title">Daftar Produk {{ Auth::user()->namaumkm }}</strong>
            <a href="{{ route('product.create') }}" class="btn btn-primary float-right" type="button">Tambahkan produk</a>

        </div>
        <div class="card-body my-n2">
            <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>User</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $data)
                
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->price }}</td>
                    <td>{{ $data->stock }}</td>
                    <td>{{ $data->category->name }}</td>
                    <td>{{ $data->userumkm->namaumkm }}</td>
                    <td>
                        <a href="{{ route('product.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('product.destroy', $data->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <div class="alert alert-danger">
                        Data tidak tersedia
                    </div>  
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
