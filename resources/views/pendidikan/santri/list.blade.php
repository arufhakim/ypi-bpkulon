@extends('layout/index')
@section('header', 'Identitas Santri | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title mb-4">IDENTITAS SANTRI</h6>
</div>
@include('alert')
<a href="{{url('/santri/create')}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah </a>
<br></br>
<div class="row">
    @foreach($santri as $st)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$st->nama}}</h5>
                <p class="card-text">{{$st->nis}}</p>
                <a href="{{url('/santri/'.$st->id)}}" class="btn btn-primary btn-sm right"> Detail </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection