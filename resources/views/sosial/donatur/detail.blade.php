@extends('layout/index')
@section('header', 'Identitas Donatur | YPI BP Kulon')
@section('judul','Identitas Donatur')
@section('action4','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">DETAIL IDENTITAS DONATUR</h6>
</div>
<div class="panel">
    <div class="row">
        <div class="col-lg">
            @include('alert')
            <div class="card">
                <div class="card-body" style="padding-top:30px;">
                    <div class="col">
                        <label><b style="margin-right:28px;">Nama Donatur</b> : {{$donatur->nama}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:79px;">Donasi</b> : @currency($donatur->donasi)</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:36px;">Jenis Kelamin</b> : {{$donatur->jenisKelamin}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:24px;">Nomor Telepon</b> : {{$donatur->noTelepon}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:76px;">Alamat</b> : {{$donatur->alamat}}</label>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <form action="{{url('/donatur/'.$donatur->id)}}" method="post" class="delete right">
                                <a href="{{url('/donatur/'.$donatur->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> Edit </a>
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