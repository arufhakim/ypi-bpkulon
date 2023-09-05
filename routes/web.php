<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Login
Route::get('/', function () {
    return view('auth.login');
});
Route::post('/login', 'AuthController@login');

Route::group(['middleware' => ['auth', 'checkRole:ketua, bendumum, bendpendidikan, bendanakasuh']], function () {
    Route::get('/home', 'HomeController');
    Route::get('/logout', 'AuthController@logout');

    //Admin
    Route::get('/admin/{user}/edit', 'AdminController@edit');
    Route::patch('/admin/{user}', 'AdminController@update');

    //Pencatatan Umum
    Route::get('/umum/index', 'PencatatanUmumController@index');
    Route::get('/umum/tambahpencatatan', 'PencatatanUmumController@tambahPencatatan');
    Route::post('/umum/simpanpencatatan', 'PencatatanUmumController@simpanPencatatan');
    Route::get('/umum/editpencatatan/{pencatatan}', 'PencatatanUmumController@editPencatatan');
    Route::patch('/umum/updatepencatatan/{pencatatan}', 'PencatatanUmumController@updatePencatatan');
    Route::delete('/umum/pencatatan/{pencatatan}', 'PencatatanUmumController@hapusPencatatan');

    //Laporan
    Route::get('/laporan/index', 'LaporanController');
});

Route::group(['middleware' => ['auth', 'checkRole:ketua, bendumum, bendpendidikan']], function () {
    //Halaman Identitas Guru 
    Route::get('/guru/list', 'GuruController@list');
    Route::resource('guru', 'GuruController');

    //Halaman Jabatan Guru
    Route::resource('jabatan', 'JabatanController', [
        'except' => ['show']
    ]);

    //Halaman Identitas Santri
    Route::get('/santri/list', 'SantriController@list');
    Route::resource('santri', 'SantriController');

    //Halaman Jenjang Santri
    Route::resource('jenjang', 'JenjangController', [
        'except' => ['show']
    ]);

    //Pencatatan Pembayaran Gaji Guru
    Route::get('/gaji/pencatatan', 'PembayaranGajiController@pencatatanGaji');
    Route::get('/gaji/tambahpencatatan/{guru}', 'PembayaranGajiController@tambahPencatatan');
    Route::post('/gaji/simpanpencatatan/{guru}', 'PembayaranGajiController@simpanPencatatan');
    Route::get('/gaji/rekappencatatan/{guru}', 'PembayaranGajiController@rekapPencatatan');
    Route::get('/gaji/editpencatatan/{pencatatan}', 'PembayaranGajiController@editPencatatan');
    Route::patch('/gaji/updatepencatatan/{pencatatan}', 'PembayaranGajiController@updatePencatatan');
    Route::delete('/gaji/pencatatan/{pencatatan}', 'PembayaranGajiController@hapusPencatatan');

    //Pencatatan Pembayaran SPP Santri
    Route::get('/spp/pencatatan', 'PembayaranSPPController@pencatatanSPP');
    Route::get('/spp/tambahpencatatan/{santri}', 'PembayaranSPPController@tambahPencatatan');
    Route::post('/spp/simpanpencatatan/{santri}', 'PembayaranSPPController@simpanPencatatan');
    Route::get('/spp/rekappencatatan/{santri}', 'PembayaranSPPController@rekapPencatatan');
    Route::get('/spp/editpencatatan/{pencatatan}', 'PembayaranSPPController@editPencatatan');
    Route::patch('/spp/updatepencatatan/{pencatatan}', 'PembayaranSPPController@updatePencatatan');
    Route::delete('/spp/pencatatan/{pencatatan}', 'PembayaranSPPController@hapusPencatatan');
});

Route::group(['middleware' => ['auth', 'checkRole:ketua, bendumum, bendanakasuh']], function () {
    //Halaman Identitas Donatur
    Route::get('/donatur/list', 'DonaturController@list');
    Route::resource('donatur', 'DonaturController');

    //Halaman Identitas Anak Asuh
    Route::get('/anakasuh/list', 'AnakAsuhController@list');
    Route::resource('anakasuh', 'AnakAsuhController');

    //Pencatatan Pemberian Donasi Donatur
    Route::get('/donasi/pencatatan', 'PemberianDonasiController@pencatatanDonasi');
    Route::get('/donasi/tambahpencatatan/{donatur}', 'PemberianDonasiController@tambahPencatatan');
    Route::post('/donasi/simpanpencatatan/{donatur}', 'PemberianDonasiController@simpanPencatatan');
    Route::get('/donasi/rekappencatatan/{donatur}', 'PemberianDonasiController@rekapPencatatan');
    Route::get('/donasi/editpencatatan/{pencatatan}', 'PemberianDonasiController@editPencatatan');
    Route::patch('/donasi/updatepencatatan/{pencatatan}', 'PemberianDonasiController@updatePencatatan');
    Route::delete('/donasi/pencatatan/{pencatatan}', 'PemberianDonasiController@hapusPencatatan');

    //Pencatatan Pemberian Bantuan Anak Asuh
    Route::get('/bantuan/pencatatan', 'PemberianBantuanController@pencatatanBantuan');
    Route::get('/bantuan/tambahpencatatan/{anakasuh}', 'PemberianBantuanController@tambahPencatatan');
    Route::post('/bantuan/simpanpencatatan/{anakasuh}', 'PemberianBantuanController@simpanPencatatan');
    Route::get('/bantuan/rekappencatatan/{anakasuh}', 'PemberianBantuanController@rekapPencatatan');
    Route::get('/bantuan/editpencatatan/{pencatatan}', 'PemberianBantuanController@editPencatatan');
    Route::patch('/bantuan/updatepencatatan/{pencatatan}', 'PemberianBantuanController@updatePencatatan');
    Route::delete('/bantuan/pencatatan/{pencatatan}', 'PemberianBantuanController@hapusPencatatan');
});

Route::group(['middleware' => ['auth', 'checkRole:ketua, bendumum']], function () {
    //Halaman Pengaturan
    Route::get('/pengaturan/index', function () {
        return view('pengaturan.index');
    });

    //Halaman Kategori
    Route::resource('kategori', 'KategoriController', [
        'except' => ['show']
    ]);

    //Halaman Saldo
    Route::resource('saldo', 'SaldoController', [
        'except' => ['show']
    ]);
});

Route::group(['middleware' => ['auth', 'checkRole:ketua']], function () {
    //Halaman Admin
    Route::get('/admin/index', 'AdminController@index');
});

    
   



















    
// //Halaman Utama Menu Guru
    // Route::get('/guru/index', function(){
    //     return view('pendidikan.guru.index');
    // });

    // //Halaman Utama Menu Santri
    // Route::get('/santri/index', function(){
    //     return view('pendidikan.santri.index');
    // });

    // //Halaman Utama Menu Donatur
    // Route::get('/donatur/index', function(){
    //     return view('sosial.donatur.index');
    // });

    // //Halaman Utama Menu Anak Asuh
    // Route::get('/anakasuh/index', function(){
    //     return view('sosial.anakasuh.index');
    // });

// Route::get('/guru/create', 'GuruController@create');
    // Route::post('/guru/store', 'GuruController@store');
    // Route::get('/guru/show/{id}', 'GuruController@show');
    // Route::get('/guru/edit/{id}', 'GuruController@edit');
    // Route::post('/guru/update/{id}', 'GuruController@update');
    // Route::delete('/guru/{id}', 'GuruController@destroy');

// Route::get('/santri/create', 'SantriController@create');
    // Route::post('/santri/store', 'SantriController@store');
    // Route::get('/santri/show/{id}', 'SantriController@show');
    // Route::get('/santri/edit/{id}', 'SantriController@edit');
    // Route::post('/santri/update/{id}', 'SantriController@update');
    // Route::delete('/santri/{id}', 'SantriController@destroy');

 // Route::get('/donatur/create', 'DonaturController@create');
    // Route::post('/donatur/store', 'DonaturController@store');
    // Route::get('/donatur/show/{id}', 'DonaturController@show');
    // Route::get('/donatur/edit/{id}', 'DonaturController@edit');
    // Route::post('/donatur/update/{id}', 'DonaturController@update');
    // Route::delete('/donatur/{id}', 'DonaturController@destroy');

// Route::get('/anakasuh/create','AnakAsuhController@create');
    // Route::post('/anakasuh/store', 'AnakAsuhController@store');
    // Route::get('/anakasuh/show/{id}', 'AnakAsuhController@show');
    // Route::get('/anakasuh/show/{id}', 'AnakAsuhController@show');
    // Route::get('/anakasuh/edit/{id}', 'AnakAsuhController@edit');
    // Route::post('/anakasuh/update/{id}', 'AnakAsuhController@update');
    // Route::delete('/anakasuh/{id}', 'AnakAsuhController@destroy');
