<?php

namespace App\Http\Requests;

use App\Enums\UserLevel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'nama' => 'required',
            'username' => 'required|unique:users,username,'.$this->user?->id,
            'email' => 'required|unique:users,email,'.$this->user?->id,
            'kata_sandi' => $this->user?->id ? 'nullable' : 'required',
            'level' => 'required|'.Rule::in(UserLevel::getValues()),
            'foto' => 'nullable|mimes:png,jpg',
        ];
    }
}
