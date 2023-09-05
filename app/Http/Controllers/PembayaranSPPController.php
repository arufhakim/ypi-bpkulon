<?php

namespace App\Http\Controllers;

use \App\Saldo;
use \App\Santri;
use \App\Kategori;
use \App\Pencatatan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PencatatanRequest;
use \App\Http\Controllers\SaldoController;

class PembayaranSPPController
{
    public $SaldoController;

    public function __construct(SaldoController $SaldoController)
    {
        $this->SaldoController = $SaldoController;
    }

    public function pencatatanSPP()
    {
        return view('pendidikan.pencatatanSantri.pembayaranSPP', [
            'pencatatan' => Pencatatan::where(!empty('santri_id')),
            'santri' => Santri::orderBy('nama')->get(),
        ]);
    }

    public function tambahPencatatan(Santri $santri)
    {
        return view('pendidikan.pencatatanSantri.tambahPembayaran', [
            'santri' => $santri,
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function simpanPencatatan(PencatatanRequest $request, Santri $santri)
    {
        $attr = $request->all();
        $attr['santri_id'] = $santri->id;
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoTambah($attr);
        Pencatatan::create($attr);

        return redirect('/spp/pencatatan')->with('success', 'Pencatatan Pembayaran SPP Santri Berhasil Ditambahkan!');
    }

    public function rekapPencatatan(Santri $santri)
    {
        if (!empty(request('mulai'))) {
            if (request('mulai') === request('hingga')) {
                $pencatatan = Pencatatan::where('santri_id', $santri->id)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::where('santri_id', $santri->id)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            }
        } else {
            $pencatatan  = Pencatatan::where('santri_id', $santri->id)
                ->orderBy('tanggalPencatatan', 'desc')
                ->get();
        }
        return view('pendidikan.pencatatanSantri.rekapPembayaran', compact('pencatatan', 'santri'));
    }

    public function editPencatatan(Pencatatan $pencatatan)
    {
        return view('pendidikan.pencatatanSantri.editPembayaran', [
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

        return redirect('/spp/rekappencatatan/' . $pencatatan->santri->id)->with('success', 'Pencatatan Pembayaran SPP Santri Berhasil Diubah!');
    }

    public function hapusPencatatan(Pencatatan $pencatatan)
    {
        $this->SaldoController->saldoHapus($pencatatan);
        $pencatatan->delete();

        return redirect('/spp/rekappencatatan/' . $pencatatan->santri->id)->with('success', 'Pencatatan Pembayaran SPP Santri Berhasil Dihapus');
    }
}
