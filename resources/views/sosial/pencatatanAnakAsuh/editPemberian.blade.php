@extends('layout/index')
@section('header', 'Pencatatan Pemberian Bantuan | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">EDIT PENCATATAN ANAK ASUH</h6>
</div>
<form method="post" action="{{url('/bantuan/updatepencatatan/'.$pencatatan->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="namaPencatatan">Nama Pencatatan</label>
        <input type="text" class="form-control @error('namaPencatatan') is-invalid @enderror" id="namaPencatatan" name="namaPencatatan" value="{{ old('namaPencatatan') ?? $pencatatan->namaPencatatan}}">
        @error('namaPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisPencatatan">Jenis Pencatatan</label>
        <select id="jenisPencatatan" name="jenisPencatatan" class="form-control" readonly>
            <option value='{{$pencatatan->jenisPencatatan}}'>{{$pencatatan->jenisPencatatan}}</option>
        </select>
        @error('jenisPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kategori_id">Kategori Pencatatan</label>
        <select id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
            @foreach($kategori as $kt)
            <option value='{{$kt->id}}' {{ old('kategori_id', $pencatatan->kategori->id) == $kt->id ? 'selected' : '' }}>{{$kt->kategori}}</option>
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
        <select id="saldo_id" name="saldo_id" class="form-control @error('saldo_id') is-invalid @enderror">
            @foreach($saldo as $sd)
            <option value='{{$sd->id}}' {{ old('saldo_id', $pencatatan->saldo->id) == $sd->id ? 'selected' : '' }}>{{$sd->jenisSaldo}}</option>
            @endforeach
        </select>
        @error('saldo_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama Anak Asuh</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$pencatatan->anakasuh->nama}}" readonly>
    </div>
    <div class="form-group">
        <label for="bantuan">Bantuan</label>
        <input type="text" class="form-control" id="bantuan" name="bantuan" value="{{$pencatatan->anakasuh->bantuan}}" readonly>
    </div>
    <div class="form-group">
        <label for="tanggalPencatatan">Tanggal Pencatatan</label>
        <input type="text" class="form-control @error('tanggalPencatatan') is-invalid @enderror" id="datepicker" name="tanggalPencatatan" value="{{ old('tanggalPencatatan') ?? $pencatatan->tanggalPencatatan}}">
        @error('tanggalPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') ?? $pencatatan->jumlah}}">
        @error('jumlah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan">
        {{$pencatatan->keterangan}}
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection