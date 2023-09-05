@extends('layout/index')
@section('header', 'Identitas Guru | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">TAMBAH GURU</h6>
</div>
<form method="post" action="{{url('/guru')}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Guru</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" id="nama" placeholder="Nama" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip')}}" id="nip" placeholder="NIP" name="nip">
        @error('nip')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jabatan_id">Jabatan</label>
        <select id="jabatan_id" name="jabatan_id" class="form-control  @error('jabatan_id') is-invalid @enderror">
            @foreach($jabatan as $jb)
            <option value='{{$jb->id}}' {{ old('jabatan_id', $jb->id) == $jb->id ? 'selected' : '' }}>{{$jb->jabatan}}</option>
            @endforeach
        </select>
        @error('jabatan_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" class="form-control @error('tempatLahir') is-invalid @enderror" value="{{old('tempatLahir')}}" id="tempatLahir" placeholder="Tempat Lahir" name="tempatLahir">
        @error('tempatLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="text" class="form-control @error('tanggalLahir') is-invalid @enderror" id="datepicker" value="{{old('tanggalLahir')}}" placeholder="Tanggal Lahir" name="tanggalLahir">
        @error('tanggalLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin</label>
        <select id="jenisKelamin" name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror">
            <option value='Laki-Laki' @if(old('jenisKelamin')=='Laki-Laki') selected @endif>Laki-Laki</option>
            <option value='Perempuan' @if(old('jenisKelamin')=='Perempuan') selected @endif>Perempuan</option>
        </select>
        @error('jenisKelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="noTelepon">Nomor Telepon</label>
        <input type="text" class="form-control @error('noTelepon') is-invalid @enderror" value="{{old('noTelepon')}}" id="noTelepon" placeholder="Nomor Telepon" name="noTelepon">
        @error('noTelepon')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" id="alamat" placeholder="Alamat" name="alamat">
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection