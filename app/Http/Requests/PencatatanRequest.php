<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PencatatanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'saldo_id' => 'required',
            'kategori_id' => 'required',
            'jumlah' => 'required|numeric',
            'jenisPencatatan' => 'required',
            'tanggalPencatatan' => 'required',
            'namaPencatatan' => 'required|max:100',
        ];
    }
}
