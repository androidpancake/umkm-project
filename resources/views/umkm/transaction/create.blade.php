@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col">
        <!-- form -->
        <form action="{{ route('transaction.store') }}" method="POST">
            @csrf
            @method('POST')   
            <input type="hidden" name="userumkm_id" value="{{ Auth::user()->id }}">
            
            <div class="form-group">
                <label>Tanggal transaksi</label>
                <input type="date" name="date" class="form-control">
            </div>
            <!-- <div class="form-group">
                <label>Pendapatan</label>
                <input type="number" name="total_price" value="0" class="form-control">
            </div> -->
            <button type="submit" class="btn btn-primary w-100">Submit</button>
            <br>
            <div class="mt-4"></div>
            
        </form>            
    </div>
</div>
@endsection