@extends('layout/index')
@section('header', 'Identitas Anak Asuh | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')

<div class="panel-heading">
    <h6 class="panel-title">EDIT ANAK ASUH</h6>
</div>
<form method="post" action="{{url('/anakasuh/'.$anakasuh->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Anak Asuh</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $anakasuh->nama}}" id="nama" placeholder="Nama" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bantuan">Bantuan</label>
        <input type="text" class="form-control @error('bantuan') is-invalid @enderror" value="{{ old('bantuan') ?? $anakasuh->bantuan}}" id="bantuan" placeholder="Bantuan" name="bantuan">
        @error('bantuan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" class="form-control @error('tempatLahir') is-invalid @enderror" value="{{ old('tempatLahir') ?? $anakasuh->tempatLahir}}" id="tempatLahir" placeholder="Tempat Lahir" name="tempatLahir">
        @error('tempatLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="text" class="form-control @error('tanggalLahir') is-invalid @enderror" id="datepicker" value="{{ old('tanggalLahir') ?? $anakasuh->tanggalLahir}}" placeholder="Tanggal Lahir" name="tanggalLahir">
        @error('tanggalLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin</label>
        <select id="jenisKelamin" name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror">
            <option value='Laki-Laki' {{ old('jenisKelamin', $anakasuh->jenisKelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value='Perempuan' {{ old('jenisKelamin', $anakasuh->jenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenisKelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="noTeleponOrtu">Nomor Telepon Orang Tua</label>
        <input type="text" class="form-control @error('noTeleponOrtu') is-invalid @enderror" value="{{ old('noTeleponOrtu') ?? $anakasuh->noTeleponOrtu}}" id="noTeleponOrtu" placeholder="Nomor Telepon Orang Tua" name="noTeleponOrtu">
        @error('noTeleponOrtu')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') ?? $anakasuh->alamat}}" id="alamat" placeholder="Alamat" name="alamat">
        @error('alamat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenjangSekolah">Jenjang Sekolah</label>
        <select id="jenjangSekolah" name="jenjangSekolah" class="form-control">
            <option value='SD/MI' {{ old('jenjangSekolah', $sekolah->jenjangSekolah) == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
            <option value='SMP/MTs' {{ old('jenjangSekolah', $sekolah->jenjangSekolah) == 'SMP/MTs' ? 'selected' : '' }}>SMP/MTs</option>
            <option value='SMA/MA' {{ old('jenjangSekolah', $sekolah->jenjangSekolah) == 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
            <option value='SMK/MAK' {{ old('jenjangSekolah', $sekolah->jenjangSekolah) == 'SMK/MAK' ? 'selected' : '' }}>SMK/MAK</option>
        </select>
    </div>
    <div class="form-group">
        <label for="namaSekolah">Nama Sekolah</label>
        <input type="text" class="form-control @error('namaSekolah') is-invalid @enderror" value="{{ old('namaSekolah') ?? $sekolah->namaSekolah}}" id="namaSekolah" placeholder="Nama Sekolah" name="namaSekolah">
        @error('namaSekolah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select id="kelas" name="kelas" class="form-control">
            <option value='1' {{ old('kelas', $sekolah->kelas) == '1' ? 'selected' : '' }}>1</option>
            <option value='2' {{ old('kelas', $sekolah->kelas) == '2' ? 'selected' : '' }}>2</option>
            <option value='3' {{ old('kelas', $sekolah->kelas) == '3' ? 'selected' : '' }}>3</option>
            <option value='4' {{ old('kelas', $sekolah->kelas) == '4' ? 'selected' : '' }}>4</option>
            <option value='5' {{ old('kelas', $sekolah->kelas) == '5' ? 'selected' : '' }}>5</option>
            <option value='6' {{ old('kelas', $sekolah->kelas) == '6' ? 'selected' : '' }}>6</option>
        </select>
    </div>
    <div class="form-group">
        <label for="sppSekolah">SPP Sekolah</label>
        <input type="text" class="form-control @error('sppSekolah') is-invalid @enderror" value="{{ old('sppSekolah') ?? $sekolah->sppSekolah}}" id="sppSekolah" placeholder="SPP Sekolah" name="sppSekolah">
        @error('sppSekolah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection