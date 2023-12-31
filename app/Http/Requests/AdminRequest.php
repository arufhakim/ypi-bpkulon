<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'nama' => 'required',
            'username' => 'required',
            'passwordLama' => ['required', new MatchOldPassword],
            'passwordBaru' => 'required',
            'passwordKonfirmasi' => ['same:passwordBaru'],
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
