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
        <h6 class="tnr" style="text-align:center"><b>LAPORAN ARUS KAS</b></h6>
        <h6 class="tnr" style="text-align:center"><b>TAHUN {{now()->year}}</b></h6>
        <br></br>

        <h6 class="tnr" style="text-align:center"><b>Periode: {{$mulai}} s/d {{$hingga}}</b></h6>

        <div class="table-responsive">
            <table class="table table-bordered table-sm tnr">
                <thead>
                    <tr>
                        <th></th>
                        <th>Catatan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center"><B>AKTIVITAS OPERASI</B></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Kas dari ZIS</td>
                        <td></td>
                        <td>@currency($jumlahZIS)</td>
                    </tr>
                    <tr>
                        <td>Kas dari Pembayaran SPP</td>
                        <td></td>
                        <td>@currency($jumlahSPP)</td>
                    </tr>
                    <tr>
                        <td>Kas dari Pemberian Donasi Rutin</td>
                        <td></td>
                        <td>@currency($jumlahDonasi)</td>
                    </tr>
                    <tr>
                        <td>Kas dari Pemberian Donasi Tahunan</td>
                        <td></td>
                        <td>@currency($jumlahDonasiTahunan)</td>
                    </tr>
                    <tr>
                        <td>Kas yang dibayarkan untuk Pembayaran Gaji</td>
                        <td></td>
                        <td>(@currency($jumlahGaji))</td>
                    </tr>
                    <tr>
                        <td>Kas yang diberikan untuk Bantuan Anak Asuh</td>
                        <td></td>
                        <td>(@currency($jumlahBantuan))</td>
                    </tr>
                    <tr>
                        <td><b>Kas Neto dari Aktivitas Operasi</b></td>
                        <td></td>
                        <td><b>@currency(($jumlahZIS+$jumlahSPP+$jumlahDonasi+$jumlahDonasiTahunan)-($jumlahGaji+$jumlahBantuan))</b></td>
                    </tr>
                    <tr>
                        <td align="center"><B>AKTIVITAS INVESTASI</B></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Rp-</td>
                    </tr>
                    <tr>
                        <td><b>Kas Neto yang digunakan untuk Aktivitas Investasi</b></td>
                        <td></td>
                        <td><b>Rp-</b></td>
                    </tr>
                    <tr>
                        <td align="center"><B>AKTIVITAS PENDANAAN</B></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Rp-</td>
                    </tr>
                    <tr>
                        <td><b>Kas Neto yang digunakan untuk Aktivitas Pendanaan</b></td>
                        <td></td>
                        <td><b>Rp-</b></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td><b>KENAIKAN (PENURUNAN) NETO DALAM KAS DAN SETARA KAS</b></td>
                        <td></td>
                        <td><b>@currency(($jumlahZIS+$jumlahSPP+$jumlahDonasi+$jumlahDonasiTahunan)-($jumlahGaji+$jumlahBantuan))</b></td>
                    </tr>
                    <tr>
                        <td><b>KAS DAN SETARA KAS AWAL PERIODE</b></td>
                        <td></td>
                        <td><b>@currency($saldoSum - ($jumlahZIS+$jumlahSPP+$jumlahDonasi+$jumlahDonasiTahunan) + ($jumlahGaji+$jumlahBantuan))</b></td>
                    </tr>
                    <tr>
                        <td><b>KAS DAN SETARA KAS AKHIR PERIODE</b></td>
                        <td></td>
                        <td><b>@currency($saldoSum)</b></td>
                    </tr>
                </tbody>
                <tfoot>

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