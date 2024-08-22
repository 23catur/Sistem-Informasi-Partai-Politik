<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Kata sandi lama wajib diisi.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password_confirmation.required' => 'Konfirmasi kata sandi baru wajib diisi.',
            'password_confirmation.confirmed' => 'Konfirmasi kata sandi baru tidak cocok dengan kata sandi baru.',
        ];
    }
}
