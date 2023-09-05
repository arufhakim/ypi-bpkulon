@extends('layout/index')
@section('header', 'Identitas Anak Asuh | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">TAMBAH ANAK ASUH</h6>
</div>
<form method="post" action="{{url('/anakasuh')}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Anak Asuh</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}" id="nama" placeholder="Nama" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bantuan">Bantuan</label>
        <input type="text" class="form-control @error('bantuan') is-invalid @enderror" value="{{old('bantuan')}}" id="bantuan" placeholder="Bantuan" name="bantuan">
        @error('bantuan')
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
            <option value='Laki-Laki' @if(old('jenisKelamin')=='Laki-Laki' ) selected @endif>Laki-Laki</option>
            <option value='Perempuan' @if(old('jenisKelamin')=='Perempuan' ) selected @endif>Perempuan</option>
        </select>
        @error('jenisKelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="noTeleponOrtu">Nomor Telepon Orang Tua</label>
        <input type="text" class="form-control @error('noTeleponOrtu') is-invalid @enderror" value="{{old('noTeleponOrtu')}}" id="noTeleponOrtu" placeholder="Nomor Telepon Orang Tua" name="noTeleponOrtu">
        @error('noTeleponOrtu')
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
    <div class="form-group">
        <label for="jenjangSekolah">Jenjang Sekolah</label>
        <select id="jenjangSekolah" name="jenjangSekolah" class="form-control">
            <option value='SD/MI' @if(old('jenjangSekolah')=='SD/MI' ) selected @endif>SD/MI</option>
            <option value='SMP/MTs' @if(old('jenjangSekolah')=='SMP/MTs' ) selected @endif>SMP/MTs</option>
            <option value='SMA/MA' @if(old('jenjangSekolah')=='SMA/MA' ) selected @endif>SMA/MA</option>
            <option value='SMK/MAK' @if(old('jenjangSekolah')=='SMK/MAK' ) selected @endif>SMK/MAK</option>
        </select>
    </div>
    <div class="form-group">
        <label for="namaSekolah">Nama Sekolah</label>
        <input type="text" class="form-control @error('namaSekolah') is-invalid @enderror" value="{{old('namaSekolah')}}" id="namaSekolah" placeholder="Nama Sekolah" name="namaSekolah">
        @error('namaSekolah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select id="kelas" name="kelas" class="form-control">
            <option value='1' @if(old('kelas')=='1' ) selected @endif>1</option>
            <option value='2' @if(old('kelas')=='2' ) selected @endif>2</option>
            <option value='3' @if(old('kelas')=='3' ) selected @endif>3</option>
            <option value='4' @if(old('kelas')=='4' ) selected @endif>4</option>
            <option value='5' @if(old('kelas')=='5' ) selected @endif>5</option>
            <option value='6' @if(old('kelas')=='6' ) selected @endif>6</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sppSekolah">SPP Sekolah</label>
        <input type="text" class="form-control @error('sppSekolah') is-invalid @enderror" value="{{old('sppSekolah')}}" id="sppSekolah" placeholder="SPP Sekolah" name="sppSekolah">
        @error('sppSekolah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection