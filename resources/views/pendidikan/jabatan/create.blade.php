@extends('layout/index')
@section('header', 'Jabatan | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">TAMBAH JABATAN</h6>
</div>
<form method="post" action="{{url('/jabatan')}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{old('jabatan')}}" id="jabatan" placeholder="Jabatan" name="jabatan">
        @error('jabatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="gaji">Gaji</label>
        <input type="text" class="form-control @error('gaji') is-invalid @enderror" value="{{old('gaji')}}" id="gaji" placeholder="Gaji" name="gaji">
        @error('gaji')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection