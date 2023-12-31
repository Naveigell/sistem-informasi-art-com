<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ExploreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"       => "required|email|string|min:3|max:255",
            "description" => "required|string|max:3000",
            "quantity"    => "required|integer|min:1",
        ];
    }
}
