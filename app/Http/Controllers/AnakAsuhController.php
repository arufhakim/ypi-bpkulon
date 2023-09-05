<?php

namespace App\Http\Controllers;

use Exception;

use App\Sekolah;
use App\AnakAsuh;
use App\Http\Requests\AnakAsuhRequest;

class AnakAsuhController
{
    public function index()
    {
        return view('sosial.anakAsuh.index');
    }

    public function list()
    {
        return view('sosial.anakAsuh.list', [
            'anakasuh' => AnakAsuh::orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('sosial.anakAsuh.create');
    }

    public function store(AnakAsuhRequest $request)
    {
        $anakasuhAttr = $request->except([
            'jenjangSekolah', 'namaSekolah', 'kelas', 'sppSekolah'
        ]);

        $anakasuh = AnakAsuh::create($anakasuhAttr);

        $sekolahAttr = $request->only([
            'jenjangSekolah', 'namaSekolah', 'kelas', 'sppSekolah'
        ]);
        $sekolahAttr['anakasuh_id'] = $anakasuh->id;

        Sekolah::create($sekolahAttr);

        return redirect('/anakasuh/list')->with('success', 'Identitas Anak Asuh Berhasil Ditambahkan!');
    }

    public function show(AnakAsuh $anakasuh)
    {
        return view('sosial.anakAsuh.detail', [
            'anakasuh' => $anakasuh,
            'sekolah' => Sekolah::where('anakasuh_id', '=', $anakasuh->id)->first(),
        ]);
    }

    public function edit(AnakAsuh $anakasuh)
    {
        return view('sosial.anakAsuh.edit', [
            'anakasuh' => $anakasuh,
            'sekolah' => Sekolah::where('anakasuh_id', '=', $anakasuh->id)->first(),
        ]);
    }

    public function update(AnakAsuhRequest $request, AnakAsuh $anakasuh)
    {
        $anakasuhAttr = $request->except([
            'jenjangSekolah', 'namaSekolah', 'kelas', 'sppSekolah'
        ]);

        $anakasuh->update($anakasuhAttr);

        $sekolahAttr = $request->only([
            'jenjangSekolah', 'namaSekolah', 'kelas', 'sppSekolah'
        ]);
        $sekolahAttr['anakasuh_id'] = $anakasuh->id;

        Sekolah::find($anakasuh->id)->update($sekolahAttr);

        return redirect('/anakasuh/list')->with('success', 'Identitas Anak Asuh Berhasil Diubah!');
    }

    public function destroy(AnakAsuh $anakasuh)
    {
        try {
            $anakasuh->delete();
            return redirect('/anakasuh/list')->with('success', 'Identitas Anak Asuh Berhasil Dihapus!');;
        } catch (Exception $e) {
            return redirect()->back()->with('failed', 'Tidak Dapat Menghapus Identitas Anak Asuh');;
        }
    }
}
