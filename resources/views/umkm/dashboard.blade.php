@extends('layouts.template')
@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <div class="row align-items-center mb-2">
      <div class="col">
        <h2 class="h5 page-title">Dashboard</h2>
        <p>Selamat datang {{ Auth::user()->name }}</p>
      </div>
    </div>
    <div class="row my-2">
      <div class="col">
        <div class="card p-2">
          <div class="card-header">Pendapatan</div>
          <div class="card-body h5 text-primary">
            Rp. {{ $pendapatan }},00
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card p-2">
          <div class="card-header">Produk</div>
          <div class="card-body h5 text-primary">{{ $produk }} Produk</div>
        </div>
      </div>
      <div class="col">
        <div class="card p-2">
          <div class="card-header">Jumlah transaksi</div>
          <div class="card-body h5 text-primary">{{ $counttransaksi }} Transaksi</div>
        </div>
      </div>
    </div>
    <div class="mb-2 align-items-center">
      <div class="card shadow mb-4">
        <div class="card-body">
          <br>
          <div class="row">
            <div class="col">
              <p class="h3 mb-3">Transaksi Harian Penjualan</p>
              <p class="text-muted mt-2">Berikut adalah diagram penjualan dari toko kamu! </p>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <input type="text" name="datetimes" class="form-control datetimes">
              </div>
            </div>
          </div>
          <div>
            <div class="row my-4">
              <div class="col-md-12">
                <div class="chart-box">
                  <canvas id="mychart"></canvas>
                </div>
              </div> <!-- .col -->
            </div>
            <div class="col flex-end">
              <a class="btn mb-2 btn-primary" href="{{ route('transaction.index') }}" role="button">Data Penjualan
                <span class="fe fe-chevron-right fe-16 ml-2"></span>
              </a>
              <a class="btn mb-2 btn-outline-primary" href="{{ route('statistik.index') }}" role="button">Statistik
                <span class="fe fe-chevron-right fe-16 ml-2"></span>
              </a>
            </div>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div>
      <div class="row">
        <!-- Recent Activity -->
        <div class="col-md-12 col-lg-8">
          <div class="card shadow">
            <div class="card-header">
              <strong class="card-title">Transaksi</strong>
              <a class="float-right small text-muted" href="./pesananbaru.html">Lihat semua</a>
            </div>
            <div class="card-body my-n2">
              <table class="table table-bordered table-hover mb-0">
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Pendapatan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($transaksi as $data)
                  <tr>
                    <td>{{ $data->id }}</td>
                    <th scope="col">{{$data->total_price}}</th>
                    <td>{{$data->date}}</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                          <a class="dropdown-item" href="{{ route('transaction.show', $data->id) }}">Lihat detail</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5">Tidak ada data</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
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

@push('chartJS')
<script src="{{ url('js/Chart.min.js')}}"></script>
@endpush
@push('charts')
<script>
    var transactions = <?php echo json_encode($chart) ?>;
    var labels = transactions.map(function(transaction) {
        return transaction.date;
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
                label: 'Transaction Amounts',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
@endpush
@endsection