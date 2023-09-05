@extends('layout/index')
@section('header', 'Jabatan | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title">JABATAN & GAJI</h6>
        </div>
        @include('alert')
        <a href="{{url('/jabatan/create')}}" class="btn btn-primary btn-sm" style="margin: 10px 20px 20px 0PX;"><i class="la la-plus-square"></i> Tambah Jabatan</a>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jabatan as $jb)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$jb->jabatan}}</td>
                        <td>@currency($jb->gaji)</td>
                        <td align="center"><a href="{{url('/jabatan/'.$jb->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> </a></td>
                        <td align="center">
                            <form action="{{url('/jabatan/'.$jb->id)}}" method="post" class="delete">
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