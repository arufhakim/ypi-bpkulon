<?php

namespace App\Http\Controllers;

use \App\Pencatatan;
use \App\Kategori;
use \App\Saldo;

class LaporanController
{
    public function __invoke()
    {
        $saldo = Saldo::all();
        $kategori = Kategori::all();

        if (!empty(request('mulai'))) {
            if (request('mulai') == request('hingga')) {
                if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where([['kategori_id', '=', request('kategoriPencatatan')], ['jenisPencatatan', '=', request('jenisPencatatan')]])
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                    $pencatatan = Pencatatan::whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } else {
                    $pencatatan = Pencatatan::whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                }
            } elseif (request('mulai') < request('hingga') || request('mulai') > request('hingga')) {
                if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where([['kategori_id', '=', request('kategoriPencatatan')], ['jenisPencatatan', '=', request('jenisPencatatan')]])
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                    $pencatatan = Pencatatan::whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                } else {
                    $pencatatan = Pencatatan::whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->orderBy('tanggalPencatatan', 'asc')
                        ->get();
                }
            }
        } else {
            if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                $pencatatan = Pencatatan::where([['kategori_id', '=', request('kategoriPencatatan')], ['jenisPencatatan', '=', request('jenisPencatatan')]])
                    ->orderBy('tanggalPencatatan', 'asc')
                    ->get();
            } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                $pencatatan = Pencatatan::where('kategori_id', '=', request('kategoriPencatatan'))
                    ->orderBy('tanggalPencatatan', 'asc')
                    ->get();
            } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                $pencatatan = Pencatatan::where('jenisPencatatan', '=', request('jenisPencatatan'))
                    ->orderBy('tanggalPencatatan', 'asc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::orderBy('tanggalPencatatan', 'asc')->get();
            }
        }

        $debit = $pencatatan->where('jenisPencatatan', '=', 'Pemasukan')->sum('jumlah');
        $kredit = $pencatatan->where('jenisPencatatan', '=', 'Pengeluaran')->sum('jumlah');

        $mulai = request()->query('mulai');
        $hingga = request()->query('hingga');

        $saldoSum = Saldo::all()->sum('jumlahSaldo');

        if (!empty(request('mulai'))) {
            if (request('mulai') === request('hingga')) {
                $jumlahGaji = Pencatatan::where('kategori_id', 1)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
                $jumlahSPP = Pencatatan::where('kategori_id', 2)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
                $jumlahDonasi = Pencatatan::where('kategori_id', 3)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
                $jumlahDonasiTahunan = Pencatatan::where('kategori_id', 4)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
                $jumlahBantuan = Pencatatan::where('kategori_id', 5)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
                $jumlahZIS = Pencatatan::where('kategori_id', 6)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->sum('jumlah');
            } else {
                $jumlahGaji = Pencatatan::where('kategori_id', 1)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
                $jumlahSPP = Pencatatan::where('kategori_id', 2)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
                $jumlahDonasi = Pencatatan::where('kategori_id', 3)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
                $jumlahDonasiTahunan = Pencatatan::where('kategori_id', 4)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
                $jumlahBantuan = Pencatatan::where('kategori_id', 5)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
                $jumlahZIS = Pencatatan::where('kategori_id', 6)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->sum('jumlah');
            }
        }else {
                $jumlahGaji = Pencatatan::where('kategori_id', 1)
                    ->sum('jumlah');
                $jumlahSPP = Pencatatan::where('kategori_id', 2)
                    ->sum('jumlah');
                $jumlahDonasi = Pencatatan::where('kategori_id', 3)
                    ->sum('jumlah');
                $jumlahDonasiTahunan = Pencatatan::where('kategori_id', 4)
                    ->sum('jumlah');
                $jumlahBantuan = Pencatatan::where('kategori_id', 5)
                    ->sum('jumlah');
                $jumlahZIS = Pencatatan::where('kategori_id', 6)
                    ->sum('jumlah');
        }

        switch (request()->input('aksi')) {
            case 'lihat':
                return view('laporan.index', compact('pencatatan', 'debit', 'kredit', 'kategori', 'saldo'));
                break;
            case 'cetak':
                return view('laporan.cetak', compact('pencatatan', 'debit', 'kredit', 'kategori', 'saldo', 'mulai', 'hingga'));
                break;
            case 'cetakArus':
                return view('laporan.cetakArus', compact('jumlahGaji', 'jumlahSPP', 'jumlahDonasi', 'jumlahDonasiTahunan', 'jumlahBantuan','jumlahZIS','mulai', 'hingga', 'saldoSum'));
                break;
            default:
                return view('laporan.index', compact('pencatatan', 'debit', 'kredit', 'kategori', 'saldo'));
                break;
        }
    }
}
