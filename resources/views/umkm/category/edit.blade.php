@extends('layouts.template')
@section('title', $title)
@section('content')
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col">
        <!-- form -->
        <form action="{{ route('category.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')   
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" class="form-control" value="{{ $data->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection