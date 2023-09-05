<?php

namespace App\Http\Controllers;

use Exception;

use App\Jenjang;
use App\Http\Requests\JenjangRequest;

class JenjangController
{
    public function index()
    {
        return view('pendidikan.jenjang.index', [
            'jenjang' => Jenjang::all(),
        ]);
    }

    public function create()
    {
        return view('pendidikan.jenjang.create');
    }

    public function store(JenjangRequest $request)
    {
        $attr = $request->all();
        Jenjang::create($attr);

        return redirect('/jenjang')->with('success', 'Jenjang Berhasil Ditambahkan!');
    }

    public function edit(Jenjang $jenjang)
    {
        return view('pendidikan.jenjang.edit', compact('jenjang'));
    }

    public function update(JenjangRequest $request, Jenjang $jenjang)
    {
        $attr = $request->all();
        $jenjang->update($attr);

        return redirect('/jenjang')->with('success', 'Jenjang Berhasil Diubah!');
    }

    public function destroy(Jenjang $jenjang)
    {
        try {
            $jenjang->delete();
            return redirect('/jenjang')->with('success', 'Jenjang Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Jenjang');
        }
    }
}
