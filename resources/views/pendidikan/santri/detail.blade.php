@extends('layout/index')
@section('header', 'Identitas Santri | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">DETAIL IDENTITAS SANTRI</h6>
</div>
<div class="panel">
    <div class="row">
        <div class="col-lg">
            @include('alert')
            <div class="card">
                <div class="card-body" style="padding-top:30px;">
                    <div class="col">
                        <label><b style="margin-right:70px;">Nama Santri</b> : {{$santri->nama}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:128px;">NIS</b> : {{$santri->nis}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:103px;">Jenjang</b> : {{$santri->jenjang->jenjang}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:125px;">SPP</b> : @currency($santri->spp)</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:66px;">Tempat Lahir</b> : {{$santri->tempatLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:62px;">Tanggal Lahir</b> : {{$santri->tanggalLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:63px;">Jenis Kelamin</b> : {{$santri->jenisKelamin}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:5px;">No Telepon Orang Tua</b> : {{$santri->noTeleponOrtu}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:103px;">Alamat</b> : {{$santri->alamat}}</label>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <form action="{{url('/santri/'.$santri->id)}}" method="post" class="delete right">
                                <a href="{{url('/santri/'.$santri->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> Edit </a>
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