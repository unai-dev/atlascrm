<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\Common\GeneralFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreClientNoteRequest extends GeneralFormRequest
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
            'note' => 'required|string',
            'client_id' => 'required|numeric|exists:clients,id',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }
}
