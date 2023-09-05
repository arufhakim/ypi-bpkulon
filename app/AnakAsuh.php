<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    protected $table = 'anakasuh';

    protected $fillable = ['nama', 'bantuan', 'tempatLahir', 'tanggalLahir', 'jenisKelamin', 'noTeleponOrtu', 'alamat', 'created_at', 'update_at'];

    public function sekolah(){
        return $this->hasOne(Sekolah::class);
    }

    public function pencatatan(){
        return $this->hasMany(Pencatatan::class);
    }
}
