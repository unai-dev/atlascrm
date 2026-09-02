<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends GeneralFormRequest
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
            "main_address" => "string|max:255",
            "second_address" => "string|max:255",
            "post_code" => "string|max:55",
            "country" => "string|max:255",
            "autonomous_community" => "string|max:255",
            "city" => "string|max:255"
        ];
    }
}
