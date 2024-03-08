<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class StoreProductRequest extends FormRequest
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
        $uniqueProductRule = $this->uniqueProductRule();

        return [
            'name'        => ['required', 'string', $uniqueProductRule],
            'status'      => 'required|string|in:'.implode(',', Product::getStatuses()),
            'quantity'    => 'required|numeric',
            'price'       => 'required|numeric',
            'description' => 'string|sometimes',
            'category_id' => 'required|integer|exists:categories,id',
            'images.*'    => 'mimes:png,jpg,jpeg',
        ];
    }

    private function uniqueProductRule()
    {
        $product = $this->route('product');

        return Rule::unique('products')->when($product, function (Unique $unique) use ($product) {
            $unique->ignore($product->id);
        });
    }
}
