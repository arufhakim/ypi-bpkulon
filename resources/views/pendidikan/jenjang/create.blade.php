@extends('layout/index')
@section('header', 'Jenjang | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">TAMBAH JENJANG</h6>
</div>
<form method="post" action="{{url('/jenjang')}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="jenjang">Jenjang</label>
        <input type="text" class="form-control @error('jenjang') is-invalid @enderror" value="{{old('jenjang')}}" id="jenjang" placeholder="Jenjang" name="jenjang">
        @error('jenjang')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection