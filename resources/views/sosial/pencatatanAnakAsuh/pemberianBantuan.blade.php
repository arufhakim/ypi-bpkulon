@extends('layout/index')
@section('header', 'Pencatatan Pemberian Bantuan | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">DAFTAR NAMA ANAK ASUH</h6>
        </div>
       @include('alert')
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Bantuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anakasuh as $aa)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$aa->nama}}</td>
                        <td>@currency($aa->bantuan)</td>
                        <td align="center">
                            <a href="{{url('/bantuan/tambahpencatatan/'.$aa->id)}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah Pembayaran</a>
                            <a href="{{url('/bantuan/rekappencatatan/'.$aa->id)}}" class="btn btn-warning btn-sm"><i class="la la-book"></i> Rekap Pembayaran</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection