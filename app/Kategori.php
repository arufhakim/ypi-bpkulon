<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = ['kategori', 'created_at', 'updated_at'];

    public function pencatatan()
    {
        return $this->hasMany(Pencatatan::class);
    } 
}
