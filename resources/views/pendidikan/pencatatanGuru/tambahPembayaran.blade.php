@extends('layout/index')
@section('header', 'Pencatatan Pembayaran Gaji | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">TAMBAH PENCATATAN GURU</h6>
</div>
<form method="post" action="{{url('/gaji/simpanpencatatan/'.$guru->id)}}">
    @method('post')
    @csrf
    <div class="form-group">
        <label for="namaPencatatan">Nama Pencatatan</label>
        <input type="text" class="form-control  @error('namaPencatatan') is-invalid @enderror" value="{{old('namaPencatatan')}}" id="namaPencatatan" name="namaPencatatan">
        @error('namaPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisPencatatan">Jenis Pencatatan</label>
        <select id="jenisPencatatan" name="jenisPencatatan" class="form-control" readonly>
            <option value='Pengeluaran' selected>Pengeluaran</option>
        </select>
        @error('jenisPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kategori_id">Kategori Pencatatan</label>
        <select id="kategori_id" name="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror" value="{{old('kategori_id')}}">
            @foreach($kategori as $kt)
            <option value='{{$kt->id}}' {{ old('kategori_id', $kt->id) == $kt->id ? 'selected' : '' }}>{{$kt->kategori}}</option>
            @endforeach
        </select>
        @error('kategori_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="saldo_id">Saldo Pencatatan</label>
        <select id="saldo_id" name="saldo_id" class="form-control  @error('saldo_id') is-invalid @enderror" value="{{old('saldo_id')}}">
            @foreach($saldo as $sd)
            <option value='{{$sd->id}}' {{ old('saldo_id', $sd->id) == $sd->id ? 'selected' : '' }}>{{$sd->jenisSaldo}}</option>
            @endforeach
        </select>
        @error('saldo_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama Guru</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$guru->nama}}" readonly>
    </div>
    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" value="{{$guru->nip}}" readonly>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select id="jabatan" name="jabatan" class="form-control" readonly>
            <option value='{{$guru->jabatan->id}}'>{{$guru->jabatan->jabatan}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="gaji">Gaji</label>
        <input type="text" class="form-control" id="gaji" name="gaji" readonly value="{{$guru->jabatan->gaji}}">
    </div>
    <div class="form-group">
        <label for="tanggalPencatatan">Tanggal Pencatatan</label>
        <input type="text" class="form-control  @error('tanggalPencatatan') is-invalid @enderror" value="{{old('tanggalPencatatan')}}" id="datepicker" name="tanggalPencatatan">
        @error('tanggalPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" class="form-control  @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') ?? $guru->jabatan->gaji}}">
        @error('jumlah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan">
    </textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Menambah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection