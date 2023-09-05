@extends('layout/index')
@section('header', 'Menu Santri | YPI BP Kulon')
@section('judul','Santri')
@section('action3','active')
@section('content')
<div class="row align-items-center">
    <div class="col-md-4">
        <div class="card card-stats card-primary cb-first">
            <a href="{{url('/santri/list')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Identitas Santri</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-warning cb-first">
            <a href="{{url('/spp/pencatatan')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-pencil"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Pencatatan SPP</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-danger cb-first">
            <a href="{{url('/jenjang')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-graduation-cap"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Jenjang</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection