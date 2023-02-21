@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col">
        <!-- form -->
        <form action="{{ route('transaction.update', $items->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')   
            <input type="hidden" name="userumkm_id" value="{{ Auth::user()->id }}">

            <table class="table">
                <tr>
                    <th>ID Transaksi</th>
                    <td>{{ $items->id }}</td>
                </tr>
                <tr>
                    <th>Total Pendapatan</th>
                    <td>{{ $items->total_price }}</td>
                    <td><input type="number" name="total_price" class="form-control" value="{{ $items->total_price }}" readonly></td>
                    
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $items->date }}</td>
                    <td><input type="date" name="date" class="form-control" value="{{ \Illuminate\Support\Carbon::parse($items->date)->format('Y-m-d') }}"></td>
                </tr>
                <tr>
                    <th>Penjual</th>
                    <th>{{ $items->userumkm->name }}</th>
                </tr>
                <tr>
                    <th>Bidang Usaha</th>
                    <th>{{ $items->userumkm->bidangusaha }}</th>
                </tr>
                
            </table>
            <div class="mt-3"></div>
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
        <br>
        <form action="{{ route('transaction.reset', $items->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn btn-outline-danger w-100" type="submit">Reset Pendapatan Transaksi</button>
        </form>
        <br>
        <div class="mt-3"></div>
        <h5>Daftar barang</h5>
            <div class="row">
                <div class="col-4">
                    <div class="card p-2 border-0">
                        
                        <form action="{{ route('detail.store', $items->id) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $items->id }}" name="transaction_id">

                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label for="my-select">Produk</label>
                                    
                                    <select id="my-select" class="form-control" name="product_id">
                                    @forelse($product as $data)
                                        <option value="{{ $data->id }}">
                                            <div class="card" value="{{ $data->id }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $data->name }}</h5>
                                                    <p class="card-text">Rp.{{ $data->price }},00</p>
                                                    <p class="text-muted">Stok : {{ $data->stock }}</p>
                                                </div>
                                            </div>
                                        </option>
                                    @empty
                                        <option value=""><p>Tidak ada produk atau produk anda habis</p></option>
                                    @endforelse

                                    </select>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                    <label for="qty">Jumlah</label>
                                    <input type="number" class="form-control" name="qty">
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary">Add to list</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <table class="table table-light">
                        <thead>
                            <th>Trs ID</th>
                            <th>Produk ID</th>
                            <th>Nama barang</th>
                            <th>Harga per barang</th>
                            <th>Jumlah</th>
                            <th>SUB TOTAL</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse($items->details as $data)
                            <tr>
                                <td>{{ $data->transaction_id }}</td>
                                <td>{{ $data->product->id }}</td>
                                <td>{{ $data->product->name }}</td>
                                <td>{{ $data->product->price }}</td>
                                <td>{{ $data->qty }}</td>
                                <td>{{ $data->sub_total }}</td>
                                <td>
                                    <form action="{{ route('detail.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            
                            @empty
                            <tr>
                                <th class="colspan-5 text-center">Tidak ada data</th>
                            </tr>
                            @endforelse
                            <tr>
                                <td>TOTAL</td>
                                <td colspan="7" class="text-end fw-semibold">{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('search.product') }}",
                data: { query: request.term },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        // select: function(event, ui) {
        //     window.location.href = "/items/" + ui.item.value;
        // }
    });
});
</script>
@endsection