@extends('layout/index')
@section('header', 'Menu Donatur | YPI BP Kulon')
@section('judul','Donatur')
@section('action4','active')
@section('content')
<div class="row align-items-center">
    <div class="col-md-4">
        <div class="card card-stats card-primary cb-first">
            <a href="{{url('/donatur/list')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Identitas Donatur</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-warning cb-first">
            <a href="{{url('/donasi/pencatatan')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-pencil"></i>
                        </div>  
                        <div class="numbers text-center">
                            <h1 class="card-title">Pencatatan Donasi</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection