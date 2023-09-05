<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    protected $table = 'pencatatan';

    protected $fillable = ['saldo_id', 'kategori_id', 'anakasuh_id', 'donatur_id', 'santri_id', 'guru_id', 'namaPencatatan', 'tanggalPencatatan', 'jenisPencatatan', 'jumlah', 'keterangan', 'oleh', 'created_at', 'updated_at'];

    protected function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    protected function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    protected function anakasuh()
    {
        return $this->belongsTo(AnakAsuh::class);
    }

    protected function donatur()
    {
        return $this->belongsTo(Donatur::class);
    }

    protected function saldo()
    {
        return $this->belongsTo(Saldo::class);
    }

    protected function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
