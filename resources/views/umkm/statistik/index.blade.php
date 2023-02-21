@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <!-- Recent Activity -->
    <div class="col-md-6">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Daftar Produk Laris {{ Auth::user()->namaumkm }}</strong>
            </div>
            <div class="card-body my-n2">
                <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                    <th>Produk</th>
                    <th>Penjualan</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($bestselling as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->selling }}</td>
                        </tr>
                        @empty
                            <td>No data</td>
                        @endforelse
                </tbody>
                </table>
                <br>
                <!-- <div class="col-auto d-flex justify-content-end">
                      <button type="button" class="btn mb-2 btn-outline-primary">Unduh laporan
                        <span class="fe fe-download fe-16 ml-2"></span>
                      </button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Produk terjual</p>
                <h5 class="card-text">{{ $produkterjual }}</h5>
                <p class="card-title">Pendapatan</p>
                <h5 class="card-text">Rp. {{ $pendapatan }},00</h5>
                
            </div>
        </div>
    </div>
</div>
@endsection
