@extends('layouts.template')
@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
    <div class="col-2">
        <nav class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{ route('umkm.profile') }}">
                    <i class="fe fe-user"></i>
                    Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{ route('umkm.profilumkm') }}" tabindex="-1" aria-disabled="true">
                    <i class="fe fe-home"></i>    
                Profil toko</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{ route('umkm.security') }}" tabindex="-1" aria-disabled="true">
                    <i class="fe fe-key"></i>    
                Keamanan</a>
            </li>
        </nav>
    </div>
    @yield('content-profile')
</div>
@endsection