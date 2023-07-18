<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePageRequest extends FormRequest
{
    public function rules() : array
    {
    }

    public function authorize() : bool
    {
        return true;
    }
}
