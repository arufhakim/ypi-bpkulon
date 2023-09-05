<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('header')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/ready.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/main.css') }}">

    <!-- DatePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="{{url('/home')}}" class="logo">
                    <img src="{{asset('assets/img/logoypi.png')}}" alt="YPI BP Kulon Logo" width="180px">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">Selamat Datang, {{auth()->user()->name}}<span></a>
                            <ul class="dropdown-menu dropdown-user">
                                <a class="dropdown-item" href="{{url('/admin/'.auth()->user()->id.'/edit')}}"><i class="ti-user"></i>Edit Profil</a>
                                <a class="dropdown-item" href="{{url('/logout')}}"></i>Logout</a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item @yield('action')">
                        <a href="{{url('/home')}}">
                            <i class="la la-fonticons"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    @if(auth()->user()->role == 'ketua' || auth()->user()->role == 'bendumum' || auth()->user()->role == 'bendpendidikan')
                    <li class="nav-item @yield('action2')">
                        <a href="{{url('/guru')}}">
                            <i class="la la-paste"></i>
                            <p>Guru</p>
                        </a>
                    </li>
                    <li class="nav-item @yield('action3')">
                        <a href="{{url('/santri')}}">
                            <i class="la la-graduation-cap"></i>
                            <p>Santri</p>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'ketua' || auth()->user()->role == 'bendumum' || auth()->user()->role == 'bendanakasuh')
                    <li class="nav-item @yield('action4')">
                        <a href="{{url('/donatur')}}">
                            <i class="la la-envelope"></i>
                            <p>Donatur</p>
                        </a>
                    </li>
                    <li class="nav-item @yield('action5')">
                        <a href="{{url('/anakasuh')}}">
                            <i class="la la-group"></i>
                            <p>Anak Asuh</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item @yield('action6')">
                        <a href="{{url('/umum/index')}}">
                            <i class="la la-pencil-square"></i>
                            <p>Pencatatan Umum</p>
                        </a>
                    </li>
                    <li class="nav-item @yield('action7')">
                        <a href="{{url('/laporan/index')}}">
                            <i class="la la-book"></i>
                            <p>Laporan Keuangan</p>
                        </a>
                    </li>
                    @if(auth()->user()->role == 'ketua')
                    <li class="nav-item @yield('action8')">
                        <a href="{{url('/admin/index')}}">
                            <i class="la la-user"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'ketua' || auth()->user()->role == 'bendumum')
                    <li class="nav-item @yield('action9')">
                        <a href="{{url('/pengaturan/index')}}">
                            <i class="la la-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title" style="font-size: 30px; color: #6c757d">@yield('judul')</h4>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/ready.min.js')}}"></script>

<!-- DatePicker JS -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Fontawesome JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

<!-- DataTable JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            "searching": true,
            "paging": true,
            "info": true,
            "lengthChange": true,
            "responsive": true
        });
    });

    $(document).ready(function() {
        $('.datatable2').DataTable({
            "searching": false,
            "paging": true,
            "info": true,
            "lengthChange": true,
        });
    });

    $(document).ready(function() {
        $('.datatable3').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "lengthChange": false,
        });
    });

    $(function() {
        $("#datepicker, #datepicker2").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

</html>