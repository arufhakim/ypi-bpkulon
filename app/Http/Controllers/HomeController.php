<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Kategori;
use App\Pencatatan;
use App\Saldo;
use Illuminate\Http\Request;

class HomeController
{
    public function __invoke()
    {

        $pemasukanHari = Pencatatan::where('jenisPencatatan', '=', 'Pemasukan')
            ->whereYear('tanggalPencatatan', now()->year)
            ->whereMonth('tanggalPencatatan', now()->month)
            ->whereDay('tanggalPencatatan', now()->day)
            ->sum('jumlah');

        $pengeluaranHari = Pencatatan::where('jenisPencatatan', '=', 'Pengeluaran')
            ->whereYear('tanggalPencatatan', '=', now()->year)
            ->whereMonth('tanggalPencatatan', '=', now()->month)
            ->whereDay('tanggalPencatatan', now()->day)
            ->sum('jumlah');

        $pemasukanBulan = Pencatatan::where('jenisPencatatan', '=', 'Pemasukan')
            ->whereYear('tanggalPencatatan', now()->year)
            ->whereMonth('tanggalPencatatan', now()->month)
            ->sum('jumlah');

        $pengeluaranBulan = Pencatatan::where('jenisPencatatan', '=', 'Pengeluaran')
            ->whereYear('tanggalPencatatan', '=', now()->year)
            ->whereMonth('tanggalPencatatan', '=', now()->month)
            ->sum('jumlah');

        $pemasukanTahun = Pencatatan::where('jenisPencatatan', '=', 'Pemasukan')
            ->whereYear('tanggalPencatatan', now()->year)
            ->sum('jumlah');

        $pengeluaranTahun = Pencatatan::where('jenisPencatatan', '=', 'Pengeluaran')
            ->whereYear('tanggalPencatatan', '=', now()->year)
            ->sum('jumlah');

        $pemasukan = Pencatatan::where('jenisPencatatan', '=', 'Pemasukan')
            ->sum('jumlah');

        $pengeluaran = Pencatatan::where('jenisPencatatan', '=', 'Pengeluaran')
            ->sum('jumlah');
        
        

        return view('home', [
            'saldo' => Saldo::all(),
            'pemasukanHari' => $pemasukanHari,
            'pengeluaranHari' => $pengeluaranHari,
            'pemasukanBulan' => $pemasukanBulan,
            'pengeluaranBulan' => $pengeluaranBulan,
            'pemasukanTahun' => $pemasukanTahun,
            'pengeluaranTahun' => $pengeluaranTahun,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'kategori' => Kategori::all(),
            'total' => Saldo::sum('jumlahSaldo'),
            'totalPencatatan' => Pencatatan::count('id'),
            'totalGuru' => Pencatatan::where('guru_id', '!=', 'null')->count('id'),
            'totalSantri' => Pencatatan::where('santri_id', '!=', 'null')->count('id'),
            'totalDonatur' => Pencatatan::where('donatur_id', '!=', 'null')->count('id'),
            'totalAnakAsuh' => Pencatatan::where('anakasuh_id', '!=', 'null')->count('id'),
            'totalUmum' => Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])->count('id'),
            'pencatatan' => Pencatatan::latest()->take(10)->get(),
        ]);
    }
}
