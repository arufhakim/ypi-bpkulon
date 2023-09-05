@extends('layout/index')
@section('header', 'Identitas Anak Asuh | YPI BP Kulon')
@section('judul','Anak Asuh')
@section('action5','active')
@section('content')
<div class="row align-items-center">
    <div class="col-md-4">
        <div class="card card-stats card-primary cb-first">
            <a href="{{url('/anakasuh/list')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Identitas Anak Asuh</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-warning cb-first">
            <a href="{{url('/bantuan/pencatatan')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-pencil"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Pencatatan Bantuan</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection