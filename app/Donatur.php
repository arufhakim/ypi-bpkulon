<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $table = 'donatur';

    protected $fillable = ['nama', 'donasi', 'jenisKelamin', 'noTelepon', 'alamat'];

    public function pencatatan(){
        return $this->hasMany(Pencatatan::class);
    }
}
