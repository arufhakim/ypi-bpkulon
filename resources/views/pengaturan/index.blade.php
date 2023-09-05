@extends('layout/index')
@section('header', 'Pengaturan | YPI BP Kulon')
@section('judul','Pengaturan')
@section('action9','active')
@section('content')
<div class="row align-items-center">
    <div class="col-md-4">
        <div class="card card-stats card-primary cb-first">
            <a href="{{url('/kategori')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-folder-o"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Kategori Pencatatan</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-warning cb-first">
            <a href="{{url('/saldo')}}">
                <div class="card-body d-flex align-items-center justify-content-center cb-index">
                    <div class="row align-items-center">
                        <div class="icon-big text-center">
                            <i class="la la-money"></i>
                        </div>
                        <div class="numbers text-center">
                            <h1 class="card-title">Saldo Pencatatan</h1>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection