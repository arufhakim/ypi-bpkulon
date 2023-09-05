@extends('layout/index')
@section('header', 'Pencatatan Umum | YPI BP Kulon')
@section('judul','Pencatatan Umum')
@section('action6','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title">PENCATATAN UMUM</h6>
            @include('alert')  
            <a href="{{url('/umum/tambahpencatatan')}}" class="btn btn-primary btn-sm" style="margin: 0px 20px 20px 0PX;"><i class="la la-plus-square"></i> Tambah Pencatatan</a></br>
            <h9 class="panel-title mt"><b>Cari Berdasarkan Tanggal</b></h9>
            <div class="judul-search">
                <form class="form" action="{{url('/umum/index')}}" method="GET">
                    <label for="mulai" class="mt">Tanggal Awal</label>
                    <input name="mulai" type="text" placeholder="Search" id="datepicker" class="search-txt" style="padding-right: 58px;"><br>
                    <label for="hingga" class="mt">Tanggal Akhir</label>
                    <input name="hingga" type="text" placeholder="Search" id="datepicker2" class="search-txt" style="padding-right: 58px;"><br>
                    <label for="kategoriPencatatan" class="mt" style="margin-right:35px;">Kategori</label>
                    <select id="kategoriPencatatan" name="kategoriPencatatan" class="search-txt" style="padding-right: 60px;">
                        <option value=''>Semua</option>
                        @foreach($kategori as $kt)
                        <option value='{{$kt->id}}'>{{$kt->kategori}}</option>
                        @endforeach
                    </select><br>
                    <label for="jenisPencatatan" class="mt" style="margin-right:57px;">Jenis</label>
                    <select id="jenisPencatatan" name="jenisPencatatan" class="search-txt" style="padding-right: 117px;">
                        <option value=''>Semua</option>
                        <option value='Pemasukan'>Pemasukan</option>
                        <option value='Pengeluaran'>Pengeluaran</option>
                    </select><br>
                    <button type="submit" class="btn btn-primary btn-sm mt ml2"><i class="fa fa-search item-w"></i> Lihat</button>
                </form>
            </div>
        </div><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pencatatan</th>
                        <th>Jenis Pencatatan</th>
                        <th>Kategori Pencatatan</th>
                        <th>Saldo Pencatatan</th>
                        <th>Tanggal Pencatatan</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Oleh</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pencatatan as $tr)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$tr->namaPencatatan}}</td>
                        <td>{{$tr->jenisPencatatan}}</td>
                        <td>{{$tr->kategori->kategori}}</td>
                        <td>{{$tr->saldo->jenisSaldo}}</td>
                        <td>{{$tr->tanggalPencatatan}}</td>
                        <td>@currency($tr->jumlah)</td>
                        <td>{{$tr->keterangan}}</td>
                        <td>{{$tr->oleh}}</td>
                        <td><a href="{{url('/umum/editpencatatan/'.$tr->id)}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i></a></td>
                        <td>
                            <form action="{{url('/umum/pencatatan/'.$tr->id)}}" method="post" class="delete">
                                @method ('delete')
                                @csrf
                                <button type="submit" class="delete btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?');"><i class="la la-trash"></i></button>
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