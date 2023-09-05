<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnakAsuhRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'nama' => 'required|max:100',
                'bantuan' => 'required|numeric', 
                'tempatLahir' => 'required|max:100',
                'tanggalLahir' => 'required',
                'jenisKelamin' => 'required',
                'noTeleponOrtu' => 'required|digits_between:7,13|numeric',
                'alamat' => 'required|max:100',
                'jenjangSekolah' => 'required',
                'namaSekolah' => 'required|max:100',
                'kelas' => 'required',
                'sppSekolah' => 'required|numeric', 
        ];
    }
}
