@extends('layout/index')
@section('header', 'Laporan Keuangan | YPI BP Kulon')
@section('judul','Laporan Keuangan')
@section('action7','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title">PENCATATAN KEUANGAN</h6>
            <h9 class="panel-title mt"><b>Cari Berdasarkan Tanggal</b></h9>
            <div class="judul-search">
                <form class="form" action="{{url('/laporan/index')}}" method="GET">
                    <label for="mulai" class="mt">Tanggal Awal</label>
                    <input name="mulai" type="text" placeholder="Search" id="datepicker" class="search" style="padding-right: 58px;"><br>
                    <label for="hingga" class="mt">Tanggal Akhir</label>
                    <input name="hingga" type="text" placeholder="Search" id="datepicker2" class="search" style="padding-right: 58px;"><br>
                    <label for="kategoriPencatatan" class="mt" style="margin-right:35px;">Kategori</label>
                    <select id="kategoriPencatatan" name="kategoriPencatatan" class="search" style="padding-right: 66px;">
                        <option value=''>Semua</option>
                        @foreach($kategori as $kt)
                        <option value='{{$kt->id}}'>{{$kt->kategori}}</option>
                        @endforeach
                    </select><br>
                    <label for="jenisPencatatan" class="mt" style="margin-right:57px;">Jenis</label>
                    <select id="jenisPencatatan" name="jenisPencatatan" class="search" style="padding-right: 123px;">
                        <option value=''>Semua</option>
                        <option value='Pemasukan'>Pemasukan</option>
                        <option value='Pengeluaran'>Pengeluaran</option>
                    </select><br>
                    <button type="submit" name="aksi" value="lihat" class="btn btn-primary btn-sm mt ml4"><i class="fa fa-search item-w"></i> Cari</button>
                    <button type="submit" name="aksi" value="cetak" class="btn btn-danger btn-sm mt"><i class="la la-print"></i> Cetak</button>
                    <button type="submit" name="aksi" value="cetakArus" class="btn btn-success btn-sm mt"><i class="la la-print"></i> Cetak Arus Kas</button>
                </form>
            </div>
        </div><br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pencatatan</th>
                        <th>Tanggal Pencatatan</th>
                        <th>Jenis Pencatatan</th>
                        <th>Kategori Pencatatan</th>
                        <th>Saldo Pencatatan</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Keterangan</th>
                        <th>Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pencatatan as $catatan)
                    <tr>
                        <td align="center" >{{$loop->iteration}}</td>
                        <td>{{$catatan->namaPencatatan}}</td>
                        <td>{{$catatan->tanggalPencatatan}}</td>
                        <td>{{$catatan->jenisPencatatan}}</td>
                        <td>{{$catatan->kategori->kategori}}</td>
                        <td>{{$catatan->saldo->jenisSaldo}}</td>
                        @if($catatan->jenisPencatatan == 'Pemasukan')
                        <td>@currency($catatan->jumlah)</td>
                        <td>-</td>
                        @else
                        <td>-</td>
                        <td>@currency($catatan->jumlah)</td>
                        @endif
                        <td>{{$catatan->keterangan}}</td>
                        <td>{{$catatan->oleh}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>TOTAL</b></td>
                        <td></td>
                        <td></td>
                        <td><b>@currency($debit)</b></td>
                        <td><b>@currency($kredit)</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection