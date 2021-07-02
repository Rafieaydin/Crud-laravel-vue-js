<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nipd' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_kelas.required' => 'The kelas field is required.' ,
        ];
    }
}
