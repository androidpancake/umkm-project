@extends('layouts.template')
@section('content')
<div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center mb-2">
              <div class="col">
                <h2 class="h5 page-title">Data Kas</h2>
                <p>{{ Auth::user()->name }}</p>
              </div>
            </div>
            <div class="mb-2 align-items-center">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="justify-content-start">
                            <div class="card-title">Pemasukan</div>
                            <div class="card-body h4 d-flex align-items-center justify-content-between">
                            Rp.{{ $pemasukan }},00
                              <form action="{{ route('kas.reset', Auth::user()->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-danger" type="submit">Reset Pendapatan</button>
                              </form>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row my-4">
                <div class="col">
                  <table class="table table-primary">
                    <thead class="thead-light">
                        <th colspan="2">Pemasukan</th>
                        <tr>
                          <th>ID</th>
                          <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>Rp.{{ $data->total_price }},00</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
@endsection