@extends('layout/index')
@section('header', 'Pencatatan Umum | YPI BP Kulon')
@section('judul','Pencatatan Umum')
@section('action6','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">EDIT PENCATATAN UMUM</h6>
</div>
<form method="post" action="{{url('/umum/updatepencatatan/'.$pencatatan->id)}}">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="namaPencatatan">Nama Pencatatan</label>
        <input type="text" class="form-control @error('namaPencatatan') is-invalid @enderror" value="{{ old('namaPencatatan') ?? $pencatatan->namaPencatatan}}" id="namaPencatatan" name="namaPencatatan">
        @error('namaPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jenisPencatatan">Jenis Pencatatan</label>
        <select id="jenisPencatatan" name="jenisPencatatan" class="form-control  @error('jenisPencatatan') is-invalid @enderror" value="{{ old('jenisPencatatan') ?? $pencatatan->jenisPencatatan}}">
            <option value='Pemasukan' {{ old('jenisPencatatan', $pencatatan->jenisPencatatan) == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value='Pengeluaran' {{ old('jenisPencatatan', $pencatatan->jenisPencatatan) == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
        @error('jenisPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="kategori_id">Kategori Pencatatan</label>
        <select id="kategori_id" name="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror">
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
        <select id="saldo_id" name="saldo_id" class="form-control  @error('saldo_id') is-invalid @enderror">
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
        <label for="tanggalPencatatan">Tanggal Pencatatan</label>
        <input type="text" class="form-control  @error('tanggalPencatatan') is-invalid @enderror" value="{{ old('tanggalPencatatan') ?? $pencatatan->tanggalPencatatan}}" id="datepicker" name="tanggalPencatatan" id="datepicker" name="tanggalPencatatan">
        @error('tanggalPencatatan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" class="form-control  @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') ?? $pencatatan->jumlah}}" id="jumlah" name="jumlah">
        @error('jumlah')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan">
        {{ old('keterangan') ?? $pencatatan->keterangan}}
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection