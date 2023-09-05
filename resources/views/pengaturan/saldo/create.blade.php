@extends('layout/index')
@section('header', 'Saldo | YPI BP Kulon')
@section('judul','Pengaturan')
@section('action9','active')
@section('content')

<div class="panel-heading">
    <h6 class="panel-title">TAMBAH SALDO</h6>
</div>
<form method="post" action="{{url('/saldo')}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="jenisSaldo">Jenis Saldo</label>
        <input type="text" class="form-control @error('jenisSaldo') is-invalid @enderror" value="{{old('jenisSaldo')}}" id="jenisSaldo" placeholder="Jenis Saldo" name="jenisSaldo">
        @error('jenisSaldo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jumlahSaldo">Jumlah Saldo</label>
        <input type="text" class="form-control @error('jumlahSaldo') is-invalid @enderror" value="{{old('jumlahSaldo')}}" id="jumlahSaldo" placeholder="Jumlah Saldo" name="jumlahSaldo">
        @error('jumlahSaldo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection