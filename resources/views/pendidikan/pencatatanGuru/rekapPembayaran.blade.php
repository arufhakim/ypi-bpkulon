@extends('layout/index')
@section('header', 'Pencatatan Pembayaran Gaji | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">REKAP PENCATATAN PEMBAYARAN GAJI - {{$guru->nama}}</h6>
            @include('alert')
            <h9 class="panel-title" style="padding: 20px 20px 20px 0PX;"><b>Cari Berdasarkan Tanggal</b></h9>
            <div class="judul-search">
                <form class="form" action="{{url('/gaji/rekappencatatan/'.$guru->id)}}" method="GET">
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
                        <th>Kredit</th>
                        <th>Keterangan</th>
                        <th>Oleh</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pencatatan as $catatan)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$catatan->namaPencatatan}}</td>
                        <td>{{$catatan->kategori->kategori}}</td>
                        <td>{{$catatan->saldo->jenisSaldo}}</td>
                        <td>{{$catatan->tanggalPencatatan}}</td>
                        <td>@currency($catatan->jumlah)</td>
                        <td>{{$catatan->keterangan}}</td>
                        <td>{{$catatan->oleh}}</td>
                        <td><a href="{{url('/gaji/editpencatatan/'.$catatan->id)}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i></a></td>
                        <td>
                            <form action="{{url('/gaji/pencatatan/'.$catatan->id)}}" method="post" class="delete">
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