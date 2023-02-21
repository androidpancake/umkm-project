@extends('layouts.templateadmin')
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
            <strong class="card-title">Daftar UMKM</strong>
            <a class="float-right small text-muted" href="./pesananbaru.html">Lihat semua</a>
        </div>
        <div class="card-body my-n2">
            <table class="table table-bordered table-hover mb-0">
            <thead>
                <tr>
                <th>Nama</th>
                <th>Nama UMKM</th>
                <th style="width: 25%">Alamat</th>
                <th>Bidang Usaha</th>
                <th>Status</th>
                <th style="width: 23%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($datauserUMKM as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->namaumkm }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->bidangusaha }}</td>
                    <td>@if($data->status == 0) Belum Aktif @else Aktif @endif</td>
                    <td>
                        <a href="{{ route('admin.approval', ['id'=>$data->id]) }}" class="btn btn-outline-success">
                            @if($data->status == 0) Aktifkan @else Nonaktif @endif
                        </a>
                        <a href="{{ route('admin.profilumkm', $data->id) }}" class="d-inline">
                            <button class="btn btn-primary">Lihat UMKM</button>
                        </a>
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
