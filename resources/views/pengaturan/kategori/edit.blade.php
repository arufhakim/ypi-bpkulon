@extends('layout/index')
@section('header', 'Kategori | YPI BP Kulon')
@section('judul','Pengaturan')
@section('action9','active')
@section('content')

<div class="panel-heading">
    <h6 class="panel-title">EDIT KATEGORI</h6>
</div>
<form method="post" action="{{url('/kategori/'.$kategori->id)}}">
    @method ('patch')
    @csrf
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') ?? $kategori->kategori}}" id="kategori" placeholder="Kategori" name="kategori">
        @error('kategori')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection