<?php

namespace App\Http\Controllers;

use Exception;

use App\Saldo;
use App\Pencatatan;
use App\Http\Requests\SaldoRequest;

class SaldoController
{
    public function index()
    {
        return view('pengaturan.saldo.index', [
            'saldo' => Saldo::all(),
        ]);
    }

    public function create()
    {
        return view('pengaturan.saldo.create');
    }

    public function store(SaldoRequest $request)
    {
        $attr = $request->all();
        Saldo::create($attr);

        return redirect('/saldo')->with('success', 'Saldo Berhasil Ditambahkan!');
    }

    public function edit(Saldo $saldo)
    {
        return view('pengaturan.saldo.edit', compact('saldo'));
    }

    public function update(SaldoRequest $request, Saldo $saldo)
    {
        $attr = $request->all();
        $saldo->update($attr);

        return redirect('/saldo')->with('success', 'Saldo Berhasil Diubah!');
    }

    public function destroy(Saldo $saldo)
    {
        try {
            $saldo->delete();
            return redirect('/saldo')->with('success', 'Saldo Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Saldo');
        }
    }

    public function saldoTambah($attr)
    {
        $saldo = Saldo::find($attr['saldo_id']);
        if ($attr['jenisPencatatan'] == 'Pengeluaran') {
            $saldo->jumlahSaldo -= $attr['jumlah'];
        } else {
            $saldo->jumlahSaldo += $attr['jumlah'];
        }
        $saldo->save();
    }

    public function saldoHapus($pencatatan)
    {
        $saldo = Saldo::find($pencatatan->saldo_id);
        $jumlah = $pencatatan->jumlah;
        if ($pencatatan->jenisPencatatan == 'Pengeluaran') {
            $saldo->jumlahSaldo += $jumlah;
        } else {
            $saldo->jumlahSaldo -= $jumlah;
        }
        $saldo->save();
    }

    public function saldoEdit($attr, $pencatatan)
    {
        $jumlahSebelumnya = $pencatatan->jumlah;
        $saldoId = $pencatatan->saldo_id;

        if ($pencatatan->jenisPencatatan == 'Pengeluaran') {
            if ($attr['jenisPencatatan'] == 'Pengeluaran') {
                if ($attr['saldo_id'] != $saldoId) {
                    $saldo = Saldo::find($saldoId);
                    $saldo->jumlahSaldo += $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo -= $attr['jumlah'];
                    $saldoBaru->save();
                } else {
                    $saldo = Saldo::find($attr['saldo_id']);
                    $saldo->jumlahSaldo += $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo -= $attr['jumlah'];
                    $saldoBaru->save();
                }
            } elseif ($attr['jenisPencatatan'] == 'Pemasukan') {
                if ($attr['saldo_id'] != $saldoId) {
                    $saldo = Saldo::find($saldoId);
                    $saldo->jumlahSaldo += $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo += $attr['jumlah'];
                    $saldoBaru->save();
                } else {
                    $saldo = Saldo::find($attr['saldo_id']);
                    $saldo->jumlahSaldo += $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo += $attr['jumlah'];
                    $saldoBaru->save();
                }
            }
        } elseif ($pencatatan->jenisPencatatan == 'Pemasukan') {
            if ($attr['jenisPencatatan'] == 'Pemasukan') {
                if ($attr['saldo_id'] != $saldoId) {
                    $saldo = Saldo::find($saldoId);
                    $saldo->jumlahSaldo -= $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo += $attr['jumlah'];
                    $saldoBaru->save();
                } else {
                    $saldo = Saldo::find($attr['saldo_id']);
                    $saldo->jumlahSaldo -= $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo += $attr['jumlah'];
                    $saldoBaru->save();
                }
            } elseif ($attr['jenisPencatatan'] == 'Pengeluaran') {
                if ($attr['saldo_id'] != $saldoId) {
                    $saldo = Saldo::find($saldoId);
                    $saldo->jumlahSaldo -= $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo -= $attr['jumlah'];
                    $saldoBaru->save();
                } else {
                    $saldo = Saldo::find($attr['saldo_id']);
                    $saldo->jumlahSaldo -= $jumlahSebelumnya;
                    $saldo->save();

                    $saldoBaru = Saldo::find($attr['saldo_id']);
                    $saldoBaru->jumlahSaldo -= $attr['jumlah'];
                    $saldoBaru->save();
                }
            }
        }
    }
}
