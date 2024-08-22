<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlternativeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kode' => 'required|unique:alternatives,code,'.$this->alternative?->id,
            'nama' => 'required',
            'no_kk' => 'required|numeric|unique:alternative_profiles,no_kk,'.$this->alternative?->profile?->id,
            'nik' => 'required|numeric|unique:alternative_profiles,nik,'.$this->alternative?->profile?->id,
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date|date_format:Y-m-d',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_hp' => 'required|numeric',
            'email' => 'required|unique:alternative_profiles,email,'.$this->alternative?->profile?->id,
        ];
    }
}
