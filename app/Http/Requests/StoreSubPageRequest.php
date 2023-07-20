<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubPageRequest extends FormRequest
{
    public function rules() : array
    {
        $uniqRule = $this->route('subPage')
            ? Rule::unique('sub_pages')->ignore($this->route('subPage'))
            : Rule::unique('sub_pages');

        return [
            'name' => ['required', 'string', $uniqRule],
            'body' => 'required',
        ];
    }

    public function authorize() : bool
    {
        return true;
    }
}
