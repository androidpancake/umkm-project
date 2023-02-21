@extends('umkm.profile.profil')
@section('content-profile')
<div class="col">
    <form action="{{ route('umkm.updateumkm', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card p-3">
        <div class="d-flex">
            <div class="h3">Profil Toko {{ Auth::user()->namaumkm }}</div>
        </div>
        <div class="mb-3">
            <div class="card p-1">
                <div class="card-header">Pendapatan</div>
                <div class="card-body h4 fw-bold">Rp.{{ $pendapatan }},00</div>
                <a href="{{ route('kas.index') }}" type="button" class="btn btn-outline-primary">Kelola Pendapatan</a>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="namaumkm" class="form-label">Nama UMKM</label>
            <input type="text" id="namaumkm" name="namaumkm" class="form-control" value="{{ Auth::user()->namaumkm }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi UMKM</label>
            <textarea type="text" id="deskripsi" name="deskripsi" class="form-control" rows="4" placeholder="{{ Auth::user()->deskripsi }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
        </div>
        <div class="mb-3">
            <label for="bidangusaha" class="form-label">Bidang usaha</label>
            <input type="text" id="bidangusaha" name="bidangusaha" class="form-control" value="{{ Auth::user()->bidangusaha }}">
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>

    </form>
</div>
@endsection