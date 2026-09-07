<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\Common\GeneralFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreClientRequest extends GeneralFormRequest
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
            'first_name' => "required|string|max:55",
            'last_name' => "required|string|max:55",
            'age' => "required|numeric",
            'phone' => "string|max:55",
            'email' => "required|string|email|unique:clients",
            'address_id' => "required|numeric|exists:addresses,id"
        ];
    }
}
