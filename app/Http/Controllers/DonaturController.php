<?php

namespace App\Http\Controllers;

use Exception;

use App\Donatur;
use App\Http\Requests\DonaturRequest;

class DonaturController
{
    public function index()
    {
        return view('sosial.donatur.index');
    }

    public function list()
    {
        return view('sosial.donatur.list', [
            'donatur' => Donatur::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('sosial.donatur.create');
    }

    public function store(DonaturRequest $request)
    {
        $attr = $request->all();
        Donatur::create($attr);

        return redirect('/donatur/list')->with('success', 'Identitas Donatur Berhasil Ditambahkan!');
    }

    public function show(Donatur $donatur)
    {
        return view('sosial.donatur.detail', compact('donatur'));
    }

    public function edit(Donatur $donatur)
    {
        return view('sosial.donatur.edit', compact('donatur'));
    }

    public function update(DonaturRequest $request, Donatur $donatur)
    {
        $attr = $request->all();
        $donatur->update($attr);

        return redirect('/donatur/list')->with('success', 'Identitas Donatur Berhasil Diubah!');
    }

    public function destroy(Donatur $donatur)
    {
        try {
            $donatur->delete();
            return redirect('/donatur/list')->with('success', 'Identitas Donatur Berhasil Dihapus!');
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Identitas Donatur');
        }
    }
}
