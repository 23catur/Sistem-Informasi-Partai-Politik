<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'ktp' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'bakalcalon' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'ijazah' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'pemilih' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'kta' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'foto' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'jasmani' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'rohani' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'narkoba' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'mantan' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'terpidana' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'mundur' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'pengadilan' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'beda_parpol' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'pemilu' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
            'gelar' => 'nullable|file|mimes:png,jpg,pdf|max:2045',
        ];
    }
}
