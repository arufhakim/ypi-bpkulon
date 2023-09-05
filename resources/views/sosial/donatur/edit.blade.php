@extends('layout/index')
@section('header', 'Identitas Donatur | YPI BP Kulon')
@section('judul','Donatur')
@section('action4','active')
@section('content')

<div class="panel-heading">
    <h6 class="panel-title">EDIT DONATUR</h6>
</div>
<form method="post" action="{{url('/donatur/'.$donatur->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Donatur</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $donatur->nama}}" id="nama" placeholder="Nama" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="donasi">Donasi</label>
        <input type="text" class="form-control @error('donasi') is-invalid @enderror" value="{{ old('donasi') ?? $donatur->donasi}}" id="donasi" placeholder="Donasi" name="donasi">
        @error('donasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin</label>
        <select id="jenisKelamin" name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror">
            <option value='Laki-Laki' {{ old('jenisKelamin', $donatur->jenisKelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value='Perempuan' {{ old('jenisKelamin', $donatur->jenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenisKelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="noTelepon">Nomor Telepon</label>
        <input type="text" class="form-control @error('noTelepon') is-invalid @enderror" value="{{ old('noTelepon') ?? $donatur->noTelepon}}" id="noTelepon" placeholder="Nomor Telepon" name="noTelepon">
        @error('noTelepon')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') ?? $donatur->alamat}}" id="alamat" placeholder="Alamat" name="alamat">
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection