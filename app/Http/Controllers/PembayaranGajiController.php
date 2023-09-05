<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Saldo;
use App\Kategori;
use App\Pencatatan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PencatatanRequest;
use App\Http\Controllers\SaldoController;

class PembayaranGajiController
{
    public $SaldoController;

    public function __construct(SaldoController $SaldoController)
    {
        $this->SaldoController = $SaldoController;
    }

    public function pencatatanGaji()
    {
        return view('pendidikan.pencatatanGuru.pembayaranGaji', [
            'guru' => Guru::orderBy('nama')->get(),
            'pencatatan' => Pencatatan::where(!empty('guru_id')),
        ]);
    }

    public function tambahPencatatan(Guru $guru)
    {
        return view('pendidikan.pencatatanGuru.tambahPembayaran', [
            'guru' => $guru,
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function simpanPencatatan(PencatatanRequest $request, Guru $guru)
    {
        $attr = $request->all();
        $attr['guru_id'] = $guru->id;
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoTambah($attr);
        Pencatatan::create($attr);

        return redirect('/gaji/pencatatan')->with('success', 'Pencatatan Pembayaran Gaji Guru Berhasil Ditambahkan!');
    }

    public function rekapPencatatan(Guru $guru)
    {
        if (!empty(request('mulai'))) {
            if (request('mulai') === request('hingga')) {
                $pencatatan = Pencatatan::where('guru_id', $guru->id)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::where('guru_id', $guru->id)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            }
        } else {
            $pencatatan  = Pencatatan::where('guru_id', $guru->id)
                ->orderBy('tanggalPencatatan', 'desc')
                ->get();
        }
        return view('pendidikan.pencatatanGuru.rekapPembayaran', compact('pencatatan', 'guru'));
    }

    public function editPencatatan(Pencatatan $pencatatan)
    {
        return view('pendidikan.pencatatanGuru.editPembayaran', [
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

        return redirect('/gaji/rekappencatatan/' . $pencatatan->guru->id)->with('success', 'Pencatatan Pembayaran Gaji Guru Berhasil Diubah!');
    }

    public function hapusPencatatan(Pencatatan $pencatatan)
    {
        $this->SaldoController->saldoHapus($pencatatan);
        $pencatatan->delete();

        return redirect('/gaji/rekappencatatan/' . $pencatatan->guru->id)->with('success', 'Pencatatan Pembayaran Gaji Guru Berhasil Dihapus!');
    }
}
