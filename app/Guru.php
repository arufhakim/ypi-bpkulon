<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['jabatan_id', 'nama', 'nip', 'tempatLahir', 'tanggalLahir', 'jenisKelamin', 'noTelepon', 'alamat', 'created_at', 'update_at'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class);
    }
}
