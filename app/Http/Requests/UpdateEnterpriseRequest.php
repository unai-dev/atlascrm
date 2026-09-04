<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UpdateEnterpriseRequest extends GeneralFormRequest
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
            'name' => 'string|max:255',
            'observations' => 'string|max:2000',
            'NIF' => [
                'string',
                'max:255',
                Rule::unique('enterprises', 'NIF')->ignore($this->route('enterprise')),
            ],
            'web_url' => 'url',
            'address_id' => 'numeric|exists:addresses,id',
        ];
    }
}
