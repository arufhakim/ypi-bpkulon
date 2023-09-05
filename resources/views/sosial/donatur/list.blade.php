@extends('layout/index')
@section('header', 'Menu Donatur | YPI BP Kulon')
@section('judul','Donatur')
@section('action4','active')
@section('content') 
<div class="panel-heading">
    <h6 class="panel-title mb-4">IDENTITAS DONATUR</h6>
</div>
@include('alert')
<a href="{{url('/donatur/create')}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah </a>
<br></br>
<div class="row">
    @foreach($donatur as $dt)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$dt->nama}}</h5>
                <a href="{{url('/donatur/'.$dt->id)}}" class="btn btn-primary btn-sm right"> Detail </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

