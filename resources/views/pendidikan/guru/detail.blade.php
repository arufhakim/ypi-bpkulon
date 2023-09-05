@extends('layout/index')
@section('header', 'Identitas Guru | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">DETAIL IDENTITAS GURU</h6>
</div>
<div class="panel">
    <div class="row">
        <div class="col-lg">
        @include('alert')
            <div class="card">
                <div class="card-body" style="padding-top:30px;">
                    <div class="col">
                        <label><b style="margin-right:50px;">Nama Guru</b> : {{$guru->nama}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:100px;">NIP</b> : {{$guru->nip}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:74px;">Jabatan</b> : {{$guru->jabatan->jabatan}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:99px;">Gaji</b> : @currency($guru->jabatan->gaji)</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:39px;">Tempat Lahir</b> : {{$guru->tempatLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:35px;">Tanggal Lahir</b> : {{$guru->tanggalLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:36px;">Jenis Kelamin</b> : {{$guru->jenisKelamin}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:24px;">Nomor Telepon</b> : {{$guru->noTelepon}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:76px;">Alamat</b> : {{$guru->alamat}}</label>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <form action="{{url('/guru/'.$guru->id)}}" method="post" class="delete right">
                                <a href="{{url('/guru/'.$guru->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> Edit </a>
                                @method ('delete')
                                @csrf
                                <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"><i class="la la-trash"></i> Hapus </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection