@extends('layout/index')
@section('header', 'Menu Guru | YPI BP Kulon')
@section('judul','Guru')
@section('action2','active')
@section('content')
<div class="row align-items-center">
    <div class="col-md-4">
        <div class="card card-stats card-primary cb-first">
            <a href="{{url('/guru/list')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Identitas Guru</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-warning cb-first">
            <a href="{{url('/gaji/pencatatan')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-pencil"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Pembayaran Gaji</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-danger cb-first">
            <a href="{{url('/jabatan')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-money"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Jabatan & Gaji</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection