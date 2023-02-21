@extends('layouts.templateadmin')
@section('content')
<div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center mb-2">
              <div class="col">
                <h2 class="h5 page-title">Dashboard</h2>
                <p>Selamat datang {{ Auth::user()->name }}</p>
              </div>
            </div>
            <div class="mb-2 align-items-center">
              <div class="row">
                <!-- daftar umkm approve -->
                <div class="col">
                  <div class="card border-2">
                    <div class="card-body">
                      <p class="card-title">Daftar UMKM</p>
                      <div class="row">
                        <div class="col h-100">
                          <a href="{{ route('admin.daftarumkm') }}" class="card bg-primary p-2 text-center ">
                            <p class="h3 text-white fw-bold">{{ $UMKMapproved }}</p>
                            <p class="text-white">Ter-approve</p>
                          </a>
                        </div>

                        <div class="col">
                          <a href="{{ route('admin.daftarumkm') }}" class="card p-2 text-center">
                            <p class="h3 fw-bold">{{ ($UMKMapproval) }}</p>
                            <p class="text-danger">Belum Ter-approve</p>
                          </a>
                        </div>
                      </div>
                      <!-- <div class="d-flex justify-content-end">
                        <a class="btn btn-primary" href="{{ route('admin.daftarumkm') }}">Approval</a>
                      </div> -->
                    </div>
                  </div>
                </div>
                <!-- daftar umkm -->
                <div class="col">
                  <div class="card h-100 border-3 border-secondary">
                    <div class="card-body d-flex align-items-center">
                      <div>
                        <p class="card-title">Jumlah UMKM</p>
                        <h5 class="card-text">{{ $userUMKM }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- pendapatan umkm -->
                <div class="col">
                  <div class="card h-100 border-3 border-success">
                    <div class="card-body d-flex align-items-center">
                      <div>
                        <p class="card-title">Pendapatan UMKM</p>
                        <h5 class="card-text">{{ $pendapatanUMKM }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row my-2">
                <div class="col">
                  <div class="card p-4">
                    <div class="h4">Pendapatan UMKM</div>
                      <div class="chart-box">
                          <canvas id="mychart"></canvas>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <!-- Recent Activity -->
                <div class="col-md-12 col-lg-8">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title">UMKM Approval</strong>
                      <a class="float-right small text-muted" href="{{ route('admin.daftarumkm') }}">Lihat semua</a>
                    </div>
                    <div class="card-body my-n2">
                      <div class="chart-box">
                          <canvas id="mychart2"></canvas>
                      </div>
                    </div>
                  </div>
                </div> <!-- Striped rows -->
                <div class="col-md-12 col-lg-4 mb-4">
                  <div class="card timeline shadow">
                    <div class="card-header">
                      <strong class="card-title">Pusat Bantuan</strong>
                      <a class="float-right small text-muted" href="pusatbantuan.html">Lihat semua</a>
                    </div>
                    <div class="card-body">
                      <img src="images/banner.svg" class="card-img" alt="..." width="250" height="318">
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- / .col-md-6 -->
                <!-- Striped rows -->
              </div> <!-- .row-->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->

@push('charts')
<script>
    var transactions = <?php echo json_encode($chartpendapatanUMKM) ?>;
    var labels = transactions.map(function(transaction) {
        return transaction.namaumkm;
    });
    var data = transactions.map(function(transaction) {
        return transaction.total_price;
    });

    var ctx = document.getElementById('mychart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pendapatan',
                data: data,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
                ],
                // borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var umkmapproved = <?php echo $UMKMapproved ?>;
    var umkmunapproved = <?php echo $UMKMapproval ?>;
    

    var ctx = document.getElementById('mychart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Approved Users', 'Unapproved Users'],
            datasets: [{
                data: [umkmapproved, umkmunapproved],
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        // options: {
        //     scales: {
        //         yAxes: [{
        //             ticks: {
        //                 beginAtZero: true
        //             }
        //         }]
        //     }
        // }
    });
</script>
@endpush
@endsection