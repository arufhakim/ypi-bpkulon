<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'nip' => [
                'required', 'numeric', 'digits:15',
                 Rule::unique('guru','nip')->ignore($this->guru) 
            ],
            'jabatan_id' => 'required',
            'tempatLahir' => 'required|max:100',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'noTelepon' => 'required|digits_between:7,13|numeric',
            'alamat' => 'required|max:100',
        ];
    }
}
