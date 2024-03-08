<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'    => ['required'],
            'email'    => ['required', 'email', 'max:254'],
            'address'  => ['required'],
            'city'     => ['required'],
            'zip_code' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
