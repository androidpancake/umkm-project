@extends('umkm.profile.profil')
@section('content-profile')

<div class="col">
    <form action="{{ route('umkm.updateprofile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <h3>Profil Anda</h3>
        <div class="mb-3">
            <div class="mb-4 mt-4 d-flex justify-content-center">
                <img src="{{ asset('avatars/'.Auth::user()->avatar) }}" class="img-responsive rounded-circle" alt="" style="width:30%;">
            </div>
            <label for="avatar" class="form-label">Foto</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Pemilik Toko</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">No. Telepon</label>
            <input type="number" id="phone_number" name="phone_number" class="form-control" value="{{ Auth::user()->phone_number }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection