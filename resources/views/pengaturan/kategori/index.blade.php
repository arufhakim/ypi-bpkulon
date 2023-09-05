@extends('layout/index')
@section('header', 'Kategori | YPI BP Kulon')
@section('judul','Pengaturan')
@section('action9','active')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="panel-heading">
            <h6 class="panel-title">KATEGORI PENCATATAN</h6>
        </div>
        @include('alert')   
        <a href="{{url('/kategori/create')}}" class="btn btn-primary btn-sm" style="margin: 10px 20px 20px 0PX;"><i class="la la-plus-square"></i> Tambah Kategori </a>
        <div class="panel-body table-responsive justify-content-center">
            <table class="table table-bordered table-striped table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $kt)
                    <tr>
                        <td align="center">{{$loop->iteration}}</td>
                        <td>{{$kt->kategori}}</td>
                        <td align="center"><a href="{{url('/kategori/'.$kt->id.'/edit')}}" class="btn btn-primary btn-sm"><i class="la la-pencil"></i> </a></td>
                        <td align="center">
                            <form action="{{url('/kategori/'.$kt->id)}}" method="post" class="delete">
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