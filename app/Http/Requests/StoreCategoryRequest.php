<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $uniqRule = $this->route('category')
            ? Rule::unique('categories')->ignore($this->route('category'))
            : Rule::unique('categories');

        $nameRules = ['required', $uniqRule];

        return [
            'name' => $nameRules
        ];
    }
}
