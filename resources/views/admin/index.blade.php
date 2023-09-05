@extends('layout/index')
@section('header', 'Admin | YPI BP Kulon')
@section('judul','Admin')
@section('action8','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title mb-4">PENGGUNA SISTEM</h6>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Admin</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $us)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$us->username}}</td>
                        <td>{{$us->name}}</td>
                        <td>
                            @if($us->role == 'ketua') Ketua
                            @elseif($us->role == 'bendumum') Bendahara Umum
                            @elseif($us->role == 'bendpendidikan') Bendahara Pendidikan
                            @elseif($us->role == 'bendanakasuh') Bendahara Anak Asuh
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection