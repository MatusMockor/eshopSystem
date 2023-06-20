<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        $uniqRule = $this->route('product')
            ? Rule::unique('products')->ignore($this->route('product'))
            : Rule::unique('products');

        return [
            'name'        => ['required', 'string', $uniqRule],
            'status'      => 'required|string|in:' . implode(',', Product::getStatuses()),
            'quantity'    => 'required|numeric',
            'price'       => 'required|numeric',
            'description' => 'string|sometimes',
            'category_id' => 'nullable|integer|exists:categories,id|sometimes',
            'images.*'    => 'mimes:png,jpg,jpeg',
        ];
    }
}
