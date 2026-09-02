<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends GeneralFormRequest
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
            'first_name' => "string|max:55",
            'last_name' => "string|max:55",
            'age' => "numeric",
            'phone' => "string|max:55",
            'email' => "string|email|unique:clients",
            'address_Id' => "numeric|exists:addresses,id"
        ];
    }
}
