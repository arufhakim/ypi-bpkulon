<?php

namespace App\Http\Controllers;

use Exception;

use App\Jenjang;
use App\Santri;
use App\Http\Requests\SantriRequest;

class SantriController
{
    public function index()
    {
        return view('pendidikan.santri.index');
    }

    public function list()
    {
        return view('pendidikan.santri.list', [
            'santri' => Santri::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('pendidikan.santri.create', [
            'jenjang' => Jenjang::all(),
        ]);
    }

    public function store(SantriRequest $request)
    {
        $attr = $request->all();
        Santri::create($attr);

        return redirect('/santri/list')->with('success', 'Identitas Santri Berhasil Ditambahkan!');
    }

    public function show(Santri $santri)
    {
        return view('pendidikan.santri.detail', compact('santri'));
    }

    public function edit(Santri $santri)
    {
        return view('pendidikan.santri.edit', [
            'santri' => $santri,
            'jenjang' => Jenjang::all(),
        ]);
    }

    public function update(SantriRequest $request, Santri $santri)
    {
        $attr = $request->all();
        $santri->update($attr);

        return redirect('/santri/list')->with('success', 'Identitas Santri Berhasil Diubah!');
    }

    public function destroy(Santri $santri)
    {
        try {
            $santri->delete();
            return redirect('/santri/list')->with('success', 'Identitas Santri Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Identitas Santri');
        }
    }
}
