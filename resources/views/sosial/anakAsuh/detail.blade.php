@extends('layout/index')
@section('header', 'Identitas Anak Asuh | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">DETAIL IDENTITAS ANAK ASUH</h6>
</div>
<div class="panel">
    <div class="row">
        <div class="col-lg">
            @include('alert')
            <div class="card">
                <div class="card-body" style="padding-top:30px;">
                    <div class="col">
                        <label><b style="margin-right:38px;">Nama Anak Asuh</b> : {{$anakasuh->nama}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:96px;">Bantuan</b> : @currency($anakasuh->bantuan)</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:66px;">Tempat Lahir</b> : {{$anakasuh->tempatLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:62px;">Tanggal Lahir</b> : {{$anakasuh->tanggalLahir}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:63px;">Jenis Kelamin</b> : {{$anakasuh->jenisKelamin}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:5px;">No Telepon Orang Tua</b> : {{$anakasuh->noTeleponOrtu}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:103px;">Alamat</b> : {{$anakasuh->alamat}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:46px;">Jenjang Sekolah</b> : {{$sekolah->jenjangSekolah}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:57px;">Nama Sekolah</b> : {{$sekolah->namaSekolah}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:116px;">Kelas</b> : {{$sekolah->kelas}}</label>
                    </div><br>
                    <div class="col">
                        <label><b style="margin-right:69px;">SPP Sekolah</b> : {{$sekolah->sppSekolah}}</label>
                    </div><br>
                    <div class="row">
                        <div class="col">
                            <form action="{{url('/anakasuh/'.$anakasuh->id)}}" method="post" class="delete right">
                                <a href="{{url('/anakasuh/'.$anakasuh->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> Edit </a>
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