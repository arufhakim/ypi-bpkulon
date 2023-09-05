<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SantriRequest extends FormRequest
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
            'nis' => [
                'required', 'numeric', 'digits:15', 
                Rule::unique('santri', 'nis')->ignore($this->santri)  
            ],
            'spp' => 'required|numeric', 
            'jenjang_id' => 'required', 
            'tempatLahir' => 'required|max:100',
            'tanggalLahir' => 'required',
            'jenisKelamin' => 'required',
            'noTeleponOrtu' => 'required|digits_between:7,13|numeric',
            'alamat' => 'required|max:100',
        ];
    }
}
