@extends('layouts.auth')
@section('content')
        
        <div class="col">
          <div class="col-md">
            @if(session('password'))
              <div class="alert alert-danger">
                  {{ session('password') }}
              </div>
            @endif
          </div>
            <form action="{{ route('umkm.login_action_umkm') }}" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
              <img src="{{ asset('images/umkm!.svg')}}" alt="homepage" style="height: 250px; width:250px;">
            </a>
            <h1 class="h6 mb-3">Masuk UMKM</h1>
            <div class="form-group">
              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
            </div>
            <div class="form-group">
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
            </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" name="remember" value="remember-me"> Tetap masuk</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
            <p class="mt-2">Belum punya akun? <a href="{{ route('umkm.register-umkm') }}">Daftar</a></p>
            <p class="mt-5 mb-3 text-muted">© 2022</p>
          </form>
      </div>
        
        
@endsection