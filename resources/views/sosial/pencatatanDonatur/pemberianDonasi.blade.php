@extends('layout/index')
@section('header', 'Pencatatan Pemberian Donasi | YPI BP Kulon')
@section('judul','Donatur')
@section('action4','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">DAFTAR NAMA DONATUR</h6>
        </div>
        @include('alert')
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Donasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donatur as $dt)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>@currency($dt->donasi)</td>
                        <td align="center">
                            <a href="{{url('/donasi/tambahpencatatan/'.$dt->id)}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah Pencatatan</a>
                            <a href="{{url('/donasi/rekappencatatan/'.$dt->id)}}" class="btn btn-warning btn-sm"><i class="la la-book"></i> Rekap Pencatatan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection