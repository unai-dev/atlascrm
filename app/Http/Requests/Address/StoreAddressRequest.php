<?php

namespace App\Http\Requests\Address;

use App\Http\Requests\Common\GeneralFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends GeneralFormRequest
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
            "main_address" => "required|string|max:255",
            "second_address" => "string|max:255",
            "post_code" => "required|string|max:55",
            "city" => "required|numeric|exists:cities,id"
        ];
    }
}
