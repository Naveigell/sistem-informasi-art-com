<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name'        => 'required|string|max:150',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:' . (1024 * 5), // 5 MB,
            'price'       => 'required|integer|min:1|max:99999999', // max 9.999.999
            'description' => 'required|string|max:9000',
        ];

        if ($this->isMethod('put')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg|max:' . (1024 * 5);
        }

        return $rules;
    }
}
