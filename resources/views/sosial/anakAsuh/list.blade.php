@extends('layout/index')
@section('header', 'Identitas Anak Asuh | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title mb-4">IDENTITAS ANAK ASUH</h6>
</div>
@include('alert')
<a href="{{url('/anakasuh/create')}}" class="btn btn-primary btn-sm"><i class="la la-plus-square"></i> Tambah </a>
<br></br>
<div class="row">
    @foreach($anakasuh as $as)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$as->nama}}</h5>
                <a href="{{url('/anakasuh/'.$as->id)}}" class="btn btn-primary btn-sm right"> Detail </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

