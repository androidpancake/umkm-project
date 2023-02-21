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
            <strong class="card-title">Daftar Transaksi {{ Auth::user()->namaumkm }}</strong>
            <form action="{{ route('transaction.create') }}" method="POST">
            @csrf
                <button class="btn btn-primary float-right" type="submit">Tambahkan Data Penjualan</button>
            </form>
        </div>
        <div class="card-body my-n2">
            <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                <th>Nama UMKM</th>
                <th>ID Transaksi</th>
                <th>Pendapatan</th>
                <th>Tanggal</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @forelse($items as $data)
                <tr>
                    <td>{{ $data->userumkm->name }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->total_price }}</td>
                    <td>{{ $data->date }}</td>
                    <td>
                        <a href="{{ route('transaction.show', $data->id) }}" class="btn btn-secondary">Detail</a>
                        <form action="{{ route('transaction.destroy', $data->id) }}" method="POST" class="d-inline">
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
