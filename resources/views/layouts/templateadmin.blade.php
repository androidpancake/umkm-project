<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <title>UMKM Indonesia!</title>
  <!-- Tiny Text Editor -->
  <script src="https://cdn.tiny.cloud/1/e8wtidxqr7vcy051v9ajcngep3oju9xflu7714ptv2g6dqeh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea#editor',
    });
  </script>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="{{ url('css/simplebar.css')}}">
  <!-- Fonts CSS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="{{ url('css/feather.css')}}">
  <link rel="stylesheet" href="{{ url('css/select2.css')}}">
  <link rel="stylesheet" href="{{ url('css/dropzone.css')}}">
  <link rel="stylesheet" href="{{ url('css/uppy.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/jquery.steps.css')}}">
  <link rel="stylesheet" href="{{ url('css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{ url('css/quill.snow.css')}}">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="{{ url('css/daterangepicker.css')}}">
  <!-- App CSS -->
  <link rel="stylesheet" href="{{ url('css/app-light.css')}}" id="lightTheme">
  <link rel="stylesheet" href="{{ url('css/app-dark.css')}}" id="darkTheme" disabled>
</head>

<body class="vertical  light  ">
  <div class="wrapper">
    <nav class="topnav navbar navbar-light">
      <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
      </button>
      <ul class="nav h3">@yield('title')</ul>
      <ul class="nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
              <strong class="pr-1 pt-2">{{ Auth::user()->name }}</strong>
              <img src="{{ asset('avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
            </span>
          </a>
          <form action="{{ route('admin.logout') }}" method="post"> 
            @csrf  
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <button class="dropdown-item" type="submit">Sign Out</div>
          </div>
          </form> 
        </li>
      </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
      <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
      </a>
      <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="dashboard.html">
            <img src="{{ asset('images/umkm!.svg')}}" alt="homepage" />
          </a>
        </div>
        <p class="text-muted nav-heading mt-4 mb-1">
          <span>Manajemen UMKM</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
          <li class="nav-item w-100">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="fe fe-home fe-16"></i>
              <span class="ml-3 item-text">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item dropdown">
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">Pesanan</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
              <li class="nav-item">
                <a class="nav-link pl-3" href="./semuapesanan.html"><span class="ml-1 item-text">Semua Pesanan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./pesananbaru.html"><span class="ml-1 item-text">Pesanan Baru</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./pesanandiproses.html"><span class="ml-1 item-text">Pesanan
                    Diproses</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./pesananselesai.html"><span class="ml-1 item-text">Pesanan
                    Selesai</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./pesanandibatalkan.html"><span class="ml-1 item-text">Pesanan
                    Dibatalkan</span></a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item w-100">
            <a class="nav-link" href="statistik.html">
              <i class="fe fe-pie-chart fe-16"></i>
              <span class="ml-3 item-text">Statistik</span>
            </a>
          </li> -->
          <li class="nav-item w-100">
            <a class="nav-link" href="{{ route('admin.daftarumkm') }}">
              <i class="fe fe-pie-chart fe-16"></i>
              <span class="ml-3 item-text">Daftar UMKM</span>
            </a>
          </li>
          <li class="nav-item w-100">
            <a class="nav-link" href="{{ route('admin.complaint') }}">
              <i class="fe fe-alert-circle fe-16"></i>
              <span class="ml-3 item-text">Komplain UMKM</span>
            </a>
          </li>
        </ul>
        

      </nav>
    </aside>
    <main role="main" class="main-content">
      <div class="container-fluid">
        @yield('content')
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
  </div> <!-- .wrapper -->
  <script src="{{ url('js/jquery.min.js')}}"></script>
  <script src="{{ url('js/popper.min.js')}}"></script>
  <script src="{{ url('js/moment.min.js')}}"></script>
  <script src="{{ url('js/bootstrap.min.js')}}"></script>
  <script src="{{ url('js/simplebar.min.js')}}"></script>
  <script src="{{ url('js/daterangepicker.js')}}"></script>
  <script src="{{ url('js/jquery.stickOnScroll.js')}}"></script>
  <script src="{{ url('js/tinycolor-min.js')}}"></script>
  <script src="{{ url('js/config.js')}}"></script>
  <script src="{{ url('js/d3.min.js')}}"></script>
  <script src="{{ url('js/topojson.min.js')}}"></script>
  <script src="{{ url('js/datamaps.all.min.js')}}"></script>
  <script src="{{ url('js/datamaps-zoomto.js')}}"></script>
  <script src="{{ url('js/datamaps.custom.js')}}"></script>
  <script src="{{ url('js/Chart.min.js')}}"></script>
  <!-- @stack('chartJS') -->
  @stack('charts')
  <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
  </script>
<script src="{{ url('js/gauge.min.js')}}"></script>
  <script src="{{ url('js/jquery.sparkline.min.js')}}"></script>
  <script src="{{ url('js/apexcharts.min.js')}}"></script>
  <script src="{{ url('js/apexcharts.custom.js')}}"></script>
  <script src="{{ url('js/jquery.mask.min.js')}}"></script>
  <script src="{{ url('js/select2.min.js')}}"></script>
  <script src="{{ url('js/jquery.steps.min.js')}}"></script>
  <script src="{{ url('js/jquery.validate.min.js')}}"></script>
  <script src="{{ url('js/jquery.timepicker.js')}}"></script>
  <script src="{{ url('js/dropzone.min.js')}}"></script>
  <script src="{{ url('js/uppy.min.js')}}"></script>
  <script src="{{ url('js/quill.min.js')}}"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
  <script>
    $('.select2').select2(
      {
        theme: 'bootstrap4',
      });
    $('.select2-multi').select2(
      {
        multiple: true,
        theme: 'bootstrap4',
      });
    $('.drgpicker').daterangepicker(
      {
        singleDatePicker: true,
        timePicker: false,
        showDropdowns: true,
        locale:
        {
          format: 'MM/DD/YYYY'
        }
      });
    $('.time-input').timepicker(
      {
        'scrollDefault': 'now',
        'zindex': '9999' /* fix modal open */
      });
    /** date range picker */
    if ($('.datetimes').length) {
      $('.datetimes').daterangepicker(
        {
          timePicker: true,
          startDate: moment().startOf('hour'),
          endDate: moment().startOf('hour').add(32, 'hour'),
          locale:
          {
            format: 'M/DD hh:mm A'
          }
        });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
      {
        startDate: start,
        endDate: end,
        ranges:
        {
          'Hari Ini': [moment(), moment()],
          'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Hari Sebelumnya': [moment().subtract(6, 'days'), moment()],
          '30 Hari Sebelumnya': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
          'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
      }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
      {
        placeholder: "__/__/____"
      });
    $('.input-zip').mask('00000-000',
      {
        placeholder: "____-___"
      });
    $('.input-money').mask("#.##0,00",
      {
        reverse: true
      });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
      {
        translation:
        {
          'Z':
          {
            pattern: /[0-9]/,
            optional: true
          }
        },
        placeholder: "___.___.___.___"
      });
    // editor
    var editor = document.getElementById('editor');
    if (editor) {
      var toolbarOptions = [
        [
          {
            'font': []
          }],
        [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [
          {
            'header': 1
          },
          {
            'header': 2
          }],
        [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
        [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
        [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
        [
          {
            'direction': 'rtl'
          }], // text direction
        [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
        [
          {
            'align': []
          }],
        ['clean'] // remove formatting button
      ];
      var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg) {
      var uppy = Uppy.Core().use(Uppy.Dashboard,
        {
          inline: true,
          target: uptarg,
          proudlyDisplayPoweredByUppy: false,
          theme: 'dark',
          width: 770,
          height: 210,
          plugins: ['Webcam']
        }).use(Uppy.Tus,
          {
            endpoint: 'https://master.tus.io/files/'
          });
      uppy.on('complete', (result) => {
        console.log('Upload complete! We???ve uploaded these files:', result.successful)
      });
    }
  </script>
  <script src="js/apps.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
  </script>
</body>

</html>