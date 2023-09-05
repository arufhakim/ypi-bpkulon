@extends('layout/index')
@section('header', 'Home | YPI BP Kulon')
@section('judul','Home')
@section('action','active')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-xl-3">
        <div class="card card-stats card-secondary card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-down"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran">@currency($pemasukanHari)</h1>
                        <p class="card-category">Pemasukan Tanggal <span><b><i>{{now()->format('j')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats bg-secondary card-ukuran text-white">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-down"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran text-white">@currency($pemasukanBulan)</h1>
                        <p class="card-category text-white">Pemasukan Bulan <span><b><i>{{now()->format('F')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats text-white bg-dark card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-down"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran text-white">@currency($pemasukanTahun)</h1>
                        <p class="card-category text-white">Pemasukan Tahun <span><b><i>{{now()->format('Y')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats card-primary card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-down"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran">@currency($pemasukan)</h1>
                        <p class="card-category">Total Pemasukan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats card-secondary card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-up"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran">@currency($pengeluaranHari)</h1>
                        <p class="card-category">Pengeluaran Tanggal <span><b><i>{{now()->format('j')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats bg-secondary text-white card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-up"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center  text-center">
                        <h1 class="card-title text-white text-ukuran">@currency($pengeluaranBulan)</h1>
                        <p class="card-category text-white">Pengeluaran Bulan <span><b><i>{{now()->format('F')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats bg-dark text-white card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-up"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran text-white">@currency($pengeluaranTahun)</h1>
                        <p class="card-category text-white">Pengeluaran Tahun <span><b><i>{{now()->format('Y')}}</i></b></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card card-stats card-primary card-ukuran">
            <div class="card-body d-flex">
                <div class="col-md-5 text-center align-self-center">
                    <div class="icon-big align-self-center">
                        <i class="la la-angle-double-up"></i>
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="numbers align-self-center text-center">
                        <h1 class="card-title text-ukuran">@currency($pengeluaran)</h1>
                        <p class="card-category">Total Pengeluaran</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron">
    <h1 class="display-4">Selamat Datang, {{auth()->user()->name}}!</h1>
    <p class="lead">Sistem Informasi Pengelolaan Keuangan YPI BP Kulon</p>
    <p class="lead" style="font-size: 14px;"><i class="la la-copyright"></i> 2020 YPI BP Kulon - All Rights Reserved</p>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="fw-bold mt-1 mb-3">Saldo Total</p>
                <h4><b>@currency($total)</b></h4>
                @if(auth()->user()->role == 'ketua' || auth()->user()->role == 'bendumum')
                <a href="{{url('/saldo/create')}}" class="btn btn-primary btn-full text-left mt-2 mb-3" style="overflow: hidden;"><i class="la la-plus"></i> Tambah Saldo Pencatatan</a>
                @endif
            </div>
            <div class="card-footer">
                <ul class="nav">
                    <li class="nav-item"><a class="btn btn-default btn-link" href="#baru"><i class="la la-history"></i> Pencatatan Terbaru</a></li>
                    <li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="/home"><i class="la la-refresh"></i> Refresh</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center" style="padding: 5px;">
                <h3 class="card-title">Saldo Keuangan</h3>
                <p class="card-category" style="margin-top: 0px;">Saldo Keuangan yang Tersedia</p>
            </div>
            <div class="card-body">
                <div class="row" style="margin-top: 13px;">
                    @foreach($saldo as $sd)
                    <div class="col-xl-4">
                        <div class="card-body">
                            <p class=" bg-info text-left text-white border-tepi" align="center" style="margin-bottom: 2px; padding: 5px 5px 5px 10px"><b>{{$sd->jenisSaldo}}</b></p>
                            <h4><b>@currency($sd->jumlahSaldo)</b></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Seluruh Pencatatan</h3>
                <p class="card-category" align="center">Jumlah Seluruh Pencatatan pada Sistem</p>
            </div>
            <div class="card-body badge-default">
                <h1 class="" align="center">{{$totalPencatatan}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Pencatatan Gaji</h3>
                <p class="card-category" align="center">Jumlah Pencatatan Gaji pada Sistem</p>
            </div>
            <div class="card-body badge-primary">
                <h1 class="" align="center">{{$totalGuru}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Pencatatan SPP</h3>
                <p class="card-category" align="center">Jumlah Pencatatan SPP pada Sistem</p>
            </div>
            <div class="card-body badge-info">
                <h1 class="" align="center">{{$totalSantri}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Pencatatan Donasi</h3>
                <p class="card-category" align="center">Jumlah Pencatatan Donasi pada Sistem</p>
            </div>
            <div class="card-body badge-success">
                <h1 class="" align="center">{{$totalDonatur}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Pencatatan Bantuan</h3>
                <p class="card-category" align="center">Jumlah Pencatatan Bantuan pada Sistem</p>
            </div>
            <div class="card-body badge-warning">
                <h1 class="" align="center">{{$totalAnakAsuh}}</h1>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" align="center">Pencatatan Umum</h3>
                <p class="card-category" align="center">Jumlah Pencatatan Umum pada Sistem</p>
            </div>
            <div class="card-body badge-danger">
                <h1 class="" align="center">{{$totalUmum}}</h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-2">
        <div class="card">
            <div class="card-header text-center" style="padding: 5px;">
                <h3 class="card-title">Kategori Pencatatan</h3>
                <p class="card-category" style="margin-top: 0px;">Kategori Pencatatan yang Tersedia</p>
            </div>
            <div class="card-body">
                <div class="row flex-column" style="margin-top: 13px;">
                    @foreach($kategori as $kt)
                    <div class="col-12">
                        <p class="text-center" align="center"><u>{{$kt->kategori}}</u></p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-10">
        <div class="card" id="baru">
            <div class="card-header text-center" style="padding: 5px;">
                <h3 class="card-title">Pencatatan yang Baru Ditambahkan</h3>
                <p class="card-category" style="margin-top: 0px;">10 Pencatatan Terbaru</p>
            </div>
            <div class="card-body">
                <div class="panel-body table-responsive">
                    <table class="table table-hover table-bordered table-striped  datatable3">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Saldo</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Oleh</th>
                                <th>Ditambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pencatatan as $catatan)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$catatan->namaPencatatan}}</td>
                                <td>{{$catatan->jenisPencatatan}}</td>
                                <td>{{$catatan->kategori->kategori}}</td>
                                <td>{{$catatan->saldo->jenisSaldo}}</td>
                                <td>{{$catatan->tanggalPencatatan}}</td>
                                <td>@currency($catatan->jumlah)</td>
                                <td>{{$catatan->keterangan}}</td>
                                <td>{{$catatan->oleh}}</td>
                                <td>{{$catatan->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection