@extends('layout/index')
@section('header', 'Pencatatan Pembayaran SPP | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')

<div class="panel-heading">
    <h6 class="panel-title">EDIT PENCATATAN SANTRI</h6>
</div>
<form method="post" action="{{url('/spp/updatepencatatan/'.$pencatatan->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="namaPencatatan">Nama Pencatatan</label>
        <input type="text" class="form-control @error('namaPencatatan') is-invalid @enderror" id="namaPencatatan" name="namaPencatatan" value="{{$pencatatan->namaPencatatan}}">
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
        <label for="nama">Nama Santri</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$pencatatan->santri->nama}}" readonly>
    </div>
    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="text" class="form-control" id="nis" name="nis" value="{{$pencatatan->santri->nis}}" readonly>
    </div>
    <div class="form-group">
        <label for="jenjang_id">Jenjang</label>
        <select id="jenjang_id" name="jenjang_id" class="form-control" readonly>
            <option value='{{$pencatatan->santri->jenjang->id}}'>{{$pencatatan->santri->jenjang->jenjang}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="spp">SPP</label>
        <input type="text" class="form-control" id="spp" name="spp" readonly value="{{$pencatatan->santri->spp}}">
    </div>
    <div class="form-group">
        <label for="tanggalPencatatan">Tanggal Pencatatan</label>
        <input type="text" class="form-control @error('tanggalPencatatan') is-invalid @enderror" id="datepicker" name="tanggalPencatatan" value="{{$pencatatan->tanggalPencatatan}}">
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