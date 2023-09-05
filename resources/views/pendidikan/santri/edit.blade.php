@extends('layout/index')
@section('header', 'Identitas Santri | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">EDIT SANTRI</h6>
</div>
<form method="post" action="{{url('/santri/'.$santri->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="nama">Nama Santri</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $santri->nama}}" id="nama" placeholder="Nama" name="nama">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="text" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') ?? $santri->nis}}" id="nis" placeholder="NIS" name="nis">
        @error('nis')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenjang_id">Jenjang</label>
        <select id="jenjang_id" name="jenjang_id" class="form-control @error('jenjang_id') is-invalid @enderror">
            @foreach($jenjang as $jg)
            <option value='{{$jg->id}}' {{ old('jenjang_id', $santri->jenjang_id) == $jg->id ? 'selected' : '' }}>{{$jg->jenjang}}</option>
            @endforeach
        </select>
        @error('jenjang_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="spp">SPP</label>
        <input type="text" class="form-control @error('spp') is-invalid @enderror" value="{{ old('spp') ?? $santri->spp}}" id="spp" placeholder="SPP" name="spp">
        @error('spp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" class="form-control @error('tempatLahir') is-invalid @enderror" value="{{ old('tempatLahir') ?? $santri->tempatLahir}}" id="tempatLahir" placeholder="Tempat Lahir" name="tempatLahir">
        @error('tempatLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="text" class="form-control @error('tanggalLahir') is-invalid @enderror" id="datepicker" value="{{ old('tanggalLahir') ?? $santri->tanggalLahir}}" placeholder="Tanggal Lahir" name="tanggalLahir">
        @error('tanggalLahir')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin</label>
        <select id="jenisKelamin" name="jenisKelamin" class="form-control  @error('jenisKelamin') is-invalid @enderror">
            <option value='Laki-Laki' {{ old('jenisKelamin', $santri->jenisKelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
            <option value='Perempuan' {{ old('jenisKelamin', $santri->jenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenisKelamin')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="noTeleponOrtu">Nomor Telepon Orang Tua</label>
        <input type="text" class="form-control @error('noTeleponOrtu') is-invalid @enderror" value="{{ old('noTeleponOrtu') ?? $santri->noTeleponOrtu}}" id="noTeleponOrtu" placeholder="Nomor Telepon" name="noTeleponOrtu">
        @error('noTeleponOrtu')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') ?? $santri->alamat}}" id="alamat" placeholder="Alamat" name="alamat">
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