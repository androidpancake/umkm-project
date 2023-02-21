<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Pasarin!</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ url('css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ url('css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ url('css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ url('css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{ url('css/app-dark.css')}}" id="darkTheme" disabled>
  </head>
  <body>
    <div class="container-fluid mt-0 mb-0">
        <form action="{{ route('umkm.storeumkm') }}" method="POST" class="w-100">
          @csrf
          
          
          <div class="row">

            <div class="col-lg-5 d-flex align-items-center" style="background-color: #459cf5;">
              <a class="navbar-brand mx-auto flex-fill d-flex justify-content-center" href="#">
                <img src="{{ asset('images/umkm!.svg')}}" alt="homepage" style="height: auto; width:350px;filter: brightness(0) invert(1);">
              </a>
            </div>
            <!-- <div class="col-sm-3"></div> -->
            <div class="col-lg-7 px-5">
              <h5 class="mb-3 mt-5">Registrasi UMKM</h5>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail">Nama UMKM</label>
                    <input type="text" name="namaumkm" id="inputEmail" class="form-control form-control" placeholder="Nama UMKM" required="" autofocus="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="inputEmail">Nama Pemilik</label>
                    <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Nama" required="" autofocus="">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="inputEmail">Email UMKM</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="inputEmail">No. Handphone</label>
                    <input type="number" name="phone_number" id="inputNoHP" class="form-control" placeholder="0822********" required="" autofocus="">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="inputPassword">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="inputPassword" class="form-control" placeholder="Konfirmasi Password" required="">
                  </div>
                </div>

                <div class="col-sm-12">
                  
                  <div class="form-group">
                    <label for="inputEmail">Deskripsi UMKM</label>
                    <textarea name="deskripsi" id="inputEmail" class="form-control" placeholder="" required="" autofocus=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Alamat</label>
                    <input type="text" name="alamat" id="inputEmail" class="form-control" placeholder="Alamat" required="" autofocus="">
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail">Bidang Usaha</label>
                    <input type="text" name="bidangusaha" id="inputEmail" class="form-control" placeholder="Bidang Usaha" required="" autofocus="">
                  </div>
                

                </div>
              </div>
              <div class="text-center">
                <button class="btn btn-primary mt-4" type="submit" style="width:200px;">Daftar</button>
                <p class="mt-2">Sudah punya akun aktif? <a href="{{ route('umkm.login-umkm') }}">Login</a></p>
                <p class="mt-5 mb-3 text-muted">© 2022</p>
              </div>
              
              
            </div>
            <!-- <div class="col-sm-3"></div> -->
          </div>
          
          

        </form>
    </div>
    <script src="{{ url('js/jquery.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/moment.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.min.js')}}"></script>
    <script src="{{ url('js/simplebar.min.js')}}"></script>
    <script src="{{ url('js/daterangepicker.js')}}"></script>
    <script src="{{ url('js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{ url('js/tinycolor-min.js')}}"></script>
    <script src="{{ url('js/config.js')}}"></script>
    <script src="{{ url('js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>