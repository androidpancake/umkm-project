@extends('umkm.profile.profil')
@section('content-profile')
<div class="col">
    <form action="{{ route('umkm.update_password', Auth::user()->id) }}" method="POST">
        @csrf
        <h3>Keamanan</h3>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Lama</label>
            <input type="password" id="password" name="current_password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection