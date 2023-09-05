<?php

namespace App\Http\Controllers;

use App\Http\Requests\PencatatanRequest;
use Illuminate\Support\Facades\Auth;

use \App\Saldo;
use \App\Kategori;
use \App\Pencatatan;

class PencatatanUmumController
{
    public $SaldoController;

    public function __construct(SaldoController $SaldoController)
    {
        $this->SaldoController = $SaldoController;
    }

    public function index()
    {
        $saldo = Saldo::all();
        $kategori = Kategori::all();

        if (!empty(request('mulai'))) {
            if (request('mulai') == request('hingga')) {
                if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } else {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereDate('tanggalPencatatan', '=', request('mulai'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                }
            } elseif (request('mulai') < request('hingga') || request('mulai') > request('hingga')) {
                if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where('kategori_id', '=', request('kategoriPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                } else {
                    $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                        ->whereBetween('tanggalPencatatan', array(request('mulai'), request('hingga')))
                        ->orderBy('tanggalPencatatan', 'desc')
                        ->get();
                }
            }
        } else {
            if (!empty(request('kategoriPencatatan'))  && !empty(request('jenisPencatatan'))) {
                $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                    ->where('kategori_id', '=', request('kategoriPencatatan'))
                    ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } elseif (!empty(request('kategoriPencatatan'))  && empty(request('jenisPencatatan'))) {
                $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                    ->where('kategori_id', '=', request('kategoriPencatatan'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } elseif (!empty(request('jenisPencatatan'))  &&  empty(request('kategoriPencatatan'))) {
                $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                    ->where('jenisPencatatan', '=', request('jenisPencatatan'))
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            } else {
                $pencatatan = Pencatatan::where([['guru_id', '=', null], ['santri_id', '=', null], ['donatur_id', '=', null], ['anakasuh_id', '=', null]])
                    ->orderBy('tanggalPencatatan', 'desc')
                    ->get();
            }
        }

        $debit = $pencatatan->where('jenisPencatatan', '=', 'Pemasukan')->sum('jumlah');
        $kredit = $pencatatan->where('jenisPencatatan', '=', 'Pengeluaran')->sum('jumlah');

        return view('umum.index', compact('pencatatan', 'debit', 'kredit', 'kategori', 'saldo'));
    }

    public function tambahPencatatan()
    {
        return view('umum.tambahPencatatan', [
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function simpanPencatatan(PencatatanRequest $request)
    {
        $attr = $request->all();
        $attr['oleh'] = Auth::user()->name;

        $this->SaldoController->saldoTambah($attr);
        Pencatatan::create($attr);

        return redirect('/umum/index')->with('success', 'Pencatatan Umum Berhasil Ditambahkan!');
    }

    public function editPencatatan(Pencatatan $pencatatan)
    {
        return view('umum.editPencatatan', [
            'pencatatan' => $pencatatan,
            'saldo' => Saldo::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function updatePencatatan(PencatatanRequest $request, Pencatatan $pencatatan)
    {
        $attr = $request->all();
        $attr['oleh'] = Auth::user()->name;
        
        $this->SaldoController->saldoEdit($attr, $pencatatan);
       
        $pencatatan->update($attr);
       
        return redirect('/umum/index')->with('success', 'Pencatatan Umum Berhasil Diubah!');
    }

    public function hapusPencatatan(Pencatatan $pencatatan)
    {
        $this->SaldoController->saldoHapus($pencatatan);
        $pencatatan->delete();

        return redirect('/umum/index')->with('success', 'Pencatatan Umum Berhasil Dihapus!');
    }
}
