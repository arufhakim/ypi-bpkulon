<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = ['jenisSaldo', 'jumlahSaldo', 'created_at', 'updated_at'];

    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class);
    }
}
