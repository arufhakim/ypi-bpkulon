@extends('layout/index')
@section('header', 'Pencatatan Pembayaran SPP | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">DAFTAR NAMA SANTRI</h6>
        </div>
        @include('alert')
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Santri</th>
                        <th>NIS</th>
                        <th>Jenjang</th>
                        <th>SPP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($santri as $st)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$st->nama}}</td>
                        <td>{{$st->nis}}</td>
                        <td>{{$st->jenjang->jenjang}}</td>
                        <td>@currency($st->spp)</td>
                        <td align="center">
                            <a href="{{url('/spp/tambahpencatatan/'.$st->id)}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah Pembayaran</a>
                            <a href="{{url('/spp/rekappencatatan/'.$st->id)}}" class="btn btn-warning btn-sm"><i class="la la-book"></i> Rekap Pembayaran</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection