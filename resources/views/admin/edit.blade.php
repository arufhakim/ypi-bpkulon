@extends('layout/index')
@section('header', 'Admin | YPI BP Kulon')
@section('judul','Admin')
@section('action8','active')
@section('content')
<div class="panel-heading">
    <h6 class="panel-title">EDIT DATA</h6>
</div>
<form method="post" action="{{url('/admin/'.$user->id)}}">
    @method ('patch')
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $user->name }}">
        @error('nama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="username"><i>Username</i></label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{  old('username') ?? $user->username }}">
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="passwordLama">Password Lama</label>
        <input type="password" class="form-control @error('passwordLama') is-invalid @enderror" id="password" name="passwordLama" value="{{ old('passwordLama') }}">
        @error('passwordLama')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="passwordBaru">Password Baru</label>
        <input type="password" class="form-control @error('passwordBaru') is-invalid @enderror" id="passwordBaru" name="passwordBaru" value="{{ old('passwordBaru') }}">
        @error('passwordBaru')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="passwordKonfirmasi">Konfirmasi Password Baru</label>
        <input type="password" class="form-control @error('passwordKonfirmasi') is-invalid @enderror" id="password" name="passwordKonfirmasi" value="{{ old('passwordKonfirmasi') }}">
        @error('passwordKonfirmasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm right mr-2" onclick="return confirm('Apakah Anda Yakin Mengubah Data Ini?');">Submit</button>
    <div class="clr"></div>
</form>
@endsection