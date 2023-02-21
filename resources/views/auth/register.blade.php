<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>UMKM Indonesia!</title>
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
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form action="{{ route('store') }}" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          @csrf
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
            <img src="{{ asset('images/umkm!.svg') }}" alt="homepage" style="height: 250px; width:250px;">
          </a>
          <h5 class="mb-3">Registrasi Admin</h5>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="name" id="inputEmail" class="form-control form-control-lg" placeholder="Nama" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
          </div>
          <!-- <div class="form-group">
            <label for="inputEmail" class="sr-only">Role</label>
            <input type="text" name="role" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">
          </div> -->
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password_confirmation" id="inputPassword" class="form-control form-control-lg" placeholder="Konfirmasi Password" required="">
          </div>
          
          <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
          <p class="mt-5 mb-3 text-muted">© 2022</p>
        </form>
      </div>
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