<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';

    protected $fillable = ['jenjang_id', 'nama', 'nis', 'spp', 'tempatLahir', 'tanggalLahir', 'jenisKelamin', 'noTeleponOrtu', 'alamat', 'created_at', 'updated_at'];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function pencatatan(){
        return $this->hasMany(Pencatatan::class);
    }
}
