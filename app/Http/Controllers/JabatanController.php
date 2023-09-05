<?php

namespace App\Http\Controllers;

use Exception;

use App\Jabatan;
use App\Http\Requests\JabatanRequest;

class JabatanController
{
    public function index()
    {
        return view('pendidikan.jabatan.index', [
            'jabatan' => Jabatan::all(),
        ]);
    }

    public function create()
    {
        return view('pendidikan.jabatan.create');
    }

    public function store(JabatanRequest $request)
    {
        $attr = $request->all();
        Jabatan::create($attr);

        return redirect('/jabatan')->with('success', 'Jabatan Berhasil Ditambahkan!');
    }

    public function edit(Jabatan $jabatan)
    {
        return view('pendidikan.jabatan.edit', compact('jabatan'));
    }

    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $attr = $request->all();
        $jabatan->update($attr);

        return redirect('/jabatan')->with('success', 'Jabatan Berhasil Diubah!');
    }

    public function destroy(Jabatan $jabatan)
    {
        try {
            $jabatan->delete();
            return redirect('/jabatan')->with('success', 'Jabatan Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Jabatan');
        }
    }
}
