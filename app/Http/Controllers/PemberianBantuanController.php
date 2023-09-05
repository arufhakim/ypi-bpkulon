<?php

namespace App\Http\Controllers;

use \App\AnakAsuh;
use \App\Saldo;
use \App\Kategori;
use \App\Pencatatan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PencatatanRequest;
use \App\Http\Controllers\SaldoController;

class PemberianBantuanController
{
    public $SaldoController;

    public function __construct(SaldoController $SaldoController)
    {
        $this->SaldoController = $SaldoController;
    }

    public function pencatatanBantuan()
    {
        return view('sosial.pencatatanAnakAsuh.pemberianBantuan', [
            'pencatatan' => Pencatatan::where(!empty('anakasuh_id')),
            'anakasuh' => AnakAsuh::orderBy('nama')->get(),
        ]);
    }

    public function tambahPencatatan(AnakAsuh $anakasuh)
    {
        return view('sosial.pencatatanAnakAsuh.tambahPemberian', [
            'anakasuh' => $anakasuh,
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function simpanPencatatan(PencatatanRequest $request, AnakAsuh $anakasuh)
    {
        $attr = $request->all();
        $attr['anakasuh_id'] = $anakasuh->id;
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoTambah($attr);
        Pencatatan::create($attr);

        return redirect('/bantuan/pencatatan')->with('success', 'Pencatatan Pemberian Bantuan Anak Asuh Berhasil Ditambahkan!');
    }

    public function rekapPencatatan(AnakAsuh $anakasuh)
    {
        if (!empty(request('mulai'))) {
            if (request('mulai') === request('hingga')) {
                $pencatatan = Pencatatan::where('anakasuh_id', $anakasuh->id)
                    ->whereDate('tanggalPencatatan', '=', request('mulai'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::where('anakasuh_id', $anakasuh->id)
                    ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            }
        } else {
            $pencatatan  = Pencatatan::where('anakasuh_id', $anakasuh->id)
                ->orderBy('tanggalPencatatan', 'desc')
                ->get();
        }
        return view('sosial.pencatatanAnakAsuh.rekapPemberian', compact('pencatatan', 'anakasuh'));
    }

    public function editPencatatan(Pencatatan $pencatatan)
    {
        return view('sosial.pencatatanAnakAsuh.editPemberian', [
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

        return redirect('/bantuan/rekappencatatan/' . $pencatatan->anakasuh->id)->with('success', 'Pencatatan Pemberian Bantuan Anak Asuh Berhasil Diubah!');
    }

    public function hapusPencatatan(Pencatatan $pencatatan)
    {
        $this->SaldoController->saldoHapus($pencatatan);
        $pencatatan->delete();

        return redirect('/bantuan/rekappencatatan/' . $pencatatan->anakasuh->id)->with('success', 'Pencatatan Pemberian Bantuan Anak Asuh Berhasil Dihapus!');
    }
}
