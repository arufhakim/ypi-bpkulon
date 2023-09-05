<?php

namespace App\Http\Controllers;

use Exception;

use App\Guru;
use App\Jabatan;
use App\Http\Requests\GuruRequest;

class GuruController
{
    public function index()
    {
        return view('pendidikan.guru.index');
    }

    public function list()
    {
        return view('pendidikan.guru.list', [
            'guru' => Guru::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('pendidikan.guru.create', [
            'jabatan' => Jabatan::all(),
        ]);
    }

    public function store(GuruRequest $request)
    {
        $attr = $request->all();
        Guru::create($attr);

        return redirect('/guru/list')->with('success', 'Identitas Guru Berhasil Ditambahkan!');
    }

    public function show(Guru $guru)
    {
        return view('pendidikan.guru.detail', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('pendidikan.guru.edit', [
            'guru' => $guru,
            'jabatan' => Jabatan::all(),
        ]);
    }

    public function update(GuruRequest $request, Guru $guru)
    {
        $attr = $request->all();
        $guru->update($attr);

        return redirect('/guru/list')->with('success', 'Identitas Guru Berhasil Diubah!');
    }

    public function destroy(Guru $guru)
    {
        try {
            $guru->delete();
            return redirect('/guru/list')->with('success', 'Identitas Guru Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Identitas Guru');;
        }
    }
}
