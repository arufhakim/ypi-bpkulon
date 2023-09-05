<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    protected $fillable = ['anakasuh_id', 'jenjangSekolah', 'namaSekolah', 'kelas', 'sppSekolah', 'created_at', 'update_at'];

    public function anakasuh(){
        return $this->belongsTo(AnakAsuh::class);
    }
}
