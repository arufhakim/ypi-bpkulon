<?php

namespace App\Http\Controllers;

use \App\Donatur;
use \App\Saldo;
use \App\Kategori;
use \App\Pencatatan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PencatatanRequest;
use \App\Http\Controllers\SaldoController;

class PemberianDonasiController
{
    public $SaldoController;

    public function __construct(SaldoController $SaldoController)
    {
        $this->SaldoController = $SaldoController;
    }

    public function pencatatanDonasi()
    {
        return view('sosial.pencatatanDonatur.pemberianDonasi', [
            'pencatatan' => Pencatatan::where(!empty('donatur_id')),
            'donatur' => Donatur::orderBy('nama')->get(),
        ]);
    }

    public function tambahPencatatan(Donatur $donatur)
    {
        return view('sosial.pencatatanDonatur.tambahPemberian', [
            'donatur' => $donatur,
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function simpanPencatatan(PencatatanRequest $request, Donatur $donatur)
    {
        $attr = $request->all();
        $attr['donatur_id'] = $donatur->id;
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoTambah($attr);
        Pencatatan::create($attr);

        return redirect('/donasi/pencatatan')->with('success', 'Pencatatan Pemberian Donasi Donatur Berhasil Ditambahkan!');
    }

    public function rekapPencatatan(Donatur $donatur)
    {
        if (!empty(request('mulai'))) {
            if (request('mulai') === request('hingga')) {
                $pencatatan = Pencatatan::where('donatur_id', $donatur->id)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::where('donatur_id', $donatur->id)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            }
        } else {
            $pencatatan  = Pencatatan::where('donatur_id', $donatur->id)
                ->orderBy('tanggalPencatatan', 'desc')
                ->get();
        }
        return view('sosial.pencatatanDonatur.rekapPemberian', compact('pencatatan', 'donatur'));
    }

    public function editPencatatan(Pencatatan $pencatatan)
    {
        return view('sosial.pencatatanDonatur.editPemberian', [
            'saldo' => Saldo::all(),
            'pencatatan' => $pencatatan,
            'kategori' => Kategori::all(),
        ]);
    }

    public function updatePencatatan(PencatatanRequest $request, Pencatatan $pencatatan)
    {
        $attr = $request->all();
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoEdit($attr, $pencatatan);
        $pencatatan->update($attr);

        return redirect('/donasi/rekappencatatan/' . $pencatatan->donatur->id)->with('success', 'Pencatatan Pemberian Donasi Donatur Berhasil Diubah!');
    }

    public function hapusPencatatan(Pencatatan $pencatatan)
    {
        $this->SaldoController->saldoHapus($pencatatan);
        $pencatatan->delete();

        return redirect('/donasi/rekappencatatan/' . $pencatatan->donatur->id)->with('success', 'Pencatatan Pemberian Donasi Donatur Berhasil Dihapus!');
    }
}
