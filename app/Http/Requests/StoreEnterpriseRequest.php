<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class StoreEnterpriseRequest extends GeneralFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'observations' => 'string|max:2000',
            'NIF' => 'required|string|max:255|unique:enterprises',
            'web_url' => 'url',
            'address_id' => 'required|numeric|exists:addresses,id',
        ];
    }
}
