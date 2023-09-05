<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    protected $table = 'jenjang';

    protected $fillable = ['jenjang', 'created_at', 'updated_at'];
    
    public function santri(){
        return $this->hasMany(Santri::class);
    }
}
