@extends('layout/index')
@section('header', 'Pencatatan Pemberian Donasi | YPI BP Kulon')
@section('judul','Donatur')
@section('action4','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">REKAP PENCATATAN PEMBERIAN DONASI - {{$donatur->nama}}</h6>
            @include('alert')
            <h9 class="panel-title" style="padding: 20px 20px 20px 0PX;"><b>Cari Berdasarkan Tanggal</b></h9>
            <div class="judul-search">
                <form class="form" action="{{url('/donasi/rekappencatatan/'.$donatur->id)}}" method="GET">
                    <label for="mulai" class="mt">Tanggal Awal</label>
                    <input name="mulai" type="text" placeholder="Search" id="datepicker" class="search-txt"><br>
                    <label for="hingga" class="mt">Tanggal Akhir</label>
                    <input name="hingga" type="text" placeholder="Search" id="datepicker2" class="search-txt"><br>
                    <button type="submit" class="btn btn-primary btn-sm mt ml3"><i class="fa fa-search item-w"></i> Lihat</button>
                </form>
            </div>
        </div><br>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pencatatan</th>
                        <th>Kategori Pencatatan</th>
                        <th>Saldo Pencatatan</th>
                        <th>Tanggal Pencatatan</th>
                        <th>Debit</th>
                        <th>Keterangan</th>
                        <th>Oleh</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pencatatan as $tr)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tr->namaPencatatan}}</td>
                        <td>{{$tr->kategori->kategori}}</td>
                        <td>{{$tr->saldo->jenisSaldo}}</td>
                        <td>{{$tr->tanggalPencatatan}}</td>
                        <td>@currency($tr->jumlah)</td>
                        <td>{{$tr->keterangan}}</td>
                        <td>{{$tr->oleh}}</td>
                        <td><a href="{{url('/donasi/editpencatatan/'.$tr->id)}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> </a></td>
                        <td>
                            <form action="{{url('/donasi/pencatatan/'.$tr->id)}}" method="post" class="delete">
                                @method ('delete')
                                @csrf
                                <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"> <i class="la la-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection