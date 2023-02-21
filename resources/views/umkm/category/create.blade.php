@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col">
        <!-- form -->
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <input type="hidden" name="userumkm_id" value="{{  Auth::user()->id }}">   
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection