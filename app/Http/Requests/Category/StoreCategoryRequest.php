<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\Common\GeneralFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreCategoryRequest extends GeneralFormRequest
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
            'name' => 'required|string|max:55|unique:categories,name',
        ];
    }
}
