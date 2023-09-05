<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';

    protected $fillable = ['jabatan', 'gaji', 'created_at', 'updated_at'];

    public function guru(){
        return $this->hasMany(Guru::class);
    }
}
