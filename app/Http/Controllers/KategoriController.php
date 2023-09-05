<?php

namespace App\Http\Controllers;

use Exception;

use App\Kategori;
use App\Http\Requests\KategoriRequest;

class KategoriController
{
    public function index()
    {
        return view('pengaturan.kategori.index', [
            'kategori' =>  Kategori::all(),
        ]);
    }

    public function create()
    {
        return view('pengaturan.kategori.create');
    }

    public function store(KategoriRequest $request)
    {
        $attr = $request->all();
        Kategori::create($attr);

        return redirect('/kategori')->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function edit(Kategori $kategori)
    {
        return view('pengaturan.kategori.edit', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $attr = $request->all();
        $kategori->update($attr);

        return redirect('/kategori')->with('success', 'Kategori Berhasil Diubah!');
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            return redirect('/kategori')->with('success', 'Kategori Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Kategori!');
        }
    }
}
