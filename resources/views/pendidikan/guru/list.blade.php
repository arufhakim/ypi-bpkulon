@extends('layout/index')
@section('header', 'Identitas Guru | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title mb-4">IDENTITAS GURU</h6>
</div>
@include('alert')
<a href="{{url('/guru/create')}}" class="btn btn-primary btn-sm "><i class="la la-plus-square"></i> Tambah Guru </a>
<br></br>
<div class="row">
    @foreach($guru as $gr)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$gr->nama}}</h5>
                <p class="card-text">{{$gr->nip}}</p>
                <a href="{{url('/guru/'.$gr->id)}}" class="btn btn-primary btn-sm right"> Detail </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection