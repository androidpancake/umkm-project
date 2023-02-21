@extends('layouts.templateadmin')
@section('title', $title)
@section('content')
<form action="" method="post">
    <div class="p-3">
        <div class="row">
            <div class="card p-4 col-md-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('avatars/'.$data->avatar) }}" class="img-responsive rounded-circle" style="width:70%;" alt="">
                </div>
            </div>
            <div class="col-md-7 p-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pemilik</label>
                    <h4>{{ $data->name }}</h4>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">No.Telepon Pemilik</label>
                    <h4>{{ $data->phone_number }}</h4>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama UMKM</label>
                    <h4>{{ $data->namaumkm }}</h4>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="3">{{ $data->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Alamat</label>
                    <h4>{{ $data->alamat }}</h4>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Bidang usaha</label>
                    <h4>{{ $data->bidangusaha }}</h4>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Email</label>
                    <h4>{{ $data->email }}</h4>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection