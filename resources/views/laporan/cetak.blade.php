<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ready.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/main.css') }}">

    <title>Laporan Cetak</title>
</head>

<body class="tnr">
    <div class="container">
        <p style="text-align:center;">
            <img src="{{asset('assets/img/header-fix4.png')}}" width="900px" alt="YPI BP Kulon Logo">
        </p><br></br>
        <h6 class="tnr" style="text-align:center"><b>LAPORAN KEUANGAN YPI BP KULON</b></h6>
        <h6 class="tnr" style="text-align:center"><b>TAHUN {{now()->year}}</b></h6>
        <br></br>

        <h6 class="tnr" style="text-align:center"><b>Periode: {{$mulai}} s/d {{$hingga}}</b></h6>

        <div class="table-responsive">
            <table class="table table-bordered table-sm tnr">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pencatatan</th>
                        <th>Kategori Pencatatan</th>
                        <th>Tanggal Pencatatan</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pencatatan as $catatan)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$catatan->namaPencatatan}}</td>
                        <td>{{$catatan->kategori->kategori}}</td>
                        <td align="center">{{$catatan->tanggalPencatatan}}</td>
                        @if($catatan->jenisPencatatan == 'Pemasukan')
                        <td>@currency($catatan->jumlah)</td>
                        <td align="center">-</td>
                        @else
                        <td align="center">-</td>
                        <td>@currency($catatan->jumlah)</td>
                        @endif
                        <td>{{$catatan->keterangan}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" align="center"><b>TOTAL</b></td>
                        <td align="center">@currency($debit)</td>
                        <td align="center">@currency($kredit)</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><u>CATATAN</u></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><br><br><br><br><br></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row mt-5 sz">
            <div class="col-8">
                Mengetahui,<br>
                Ketua YPI BP Kulon Gresik
                <br><br><br><br><br>
                Linda Abdul Haris
            </div>
            <div class="col-4">
                Gresik, {{now()->toDateString()}}<br>
                @if(auth()->user()->role == 'ketua') Ketua
                @elseif(auth()->user()->role == 'bendumum') Bendahara Umum
                @elseif(auth()->user()->role == 'bendpendidikan') Bendahara Pendidikan
                @elseif(auth()->user()->role == 'bendanakasuh') Bendahara Anak Asuh
                @endif
                <br><br><br><br><br>
                {{auth()->user()->name}}
            </div>
        </div>
    </div>
</body>
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ready.min.js')}}"></script>

<script>
    window.print();
</script>


</html>