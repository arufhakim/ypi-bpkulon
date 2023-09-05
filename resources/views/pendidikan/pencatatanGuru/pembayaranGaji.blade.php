@extends('layout/index')
@section('header', 'Pencatatan Pembayaran Gaji | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">DAFTAR NAMA GURU</h6>
        </div>
        @include('alert')
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $gr)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$gr->nama}}</td>
                        <td>{{$gr->nip}}</td>
                        <td>{{$gr->jabatan->jabatan}}</td>
                        <td>@currency($gr->jabatan->gaji)</td>
                        <td align="center">
                            <a href="{{url('/gaji/tambahpencatatan/'.$gr->id)}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah Pembayaran</a>
                            <a href="{{url('/gaji/rekappencatatan/'.$gr->id)}}" class="btn btn-warning btn-sm"><i class="la la-book"></i> Rekap Pembayaran</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection