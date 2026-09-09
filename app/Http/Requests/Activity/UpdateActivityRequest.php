<?php

namespace App\Http\Requests\Activity;

use App\Http\Requests\Common\GeneralFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateActivityRequest extends GeneralFormRequest
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
            "type" => "string|max:55",
            "description" => "string",
            "category_id" => "numeric|exists:categories,id",
            "address_id" => "numeric|exists:addresses,id",
            "user_id" => "numeric|exists:users,id",
            "client_id" => "numeric|exists:clients,id",
            "status" => "string|max:55",
            "start_date" => "date"
        ];
    }
}
