<?php

namespace App\Http\Requests;

use App\Enums\CriteriaAttribute;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CriteriaRequest extends FormRequest
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
            'kode' => 'required|unique:criterias,code,'.$this->criteria?->id,
            'nama' => 'required',
            'atribut' => 'required|'.Rule::in(CriteriaAttribute::getValues()),
            'bobot' => 'required|numeric',
            'keterangan' => 'nullable',
        ];
    }
}
