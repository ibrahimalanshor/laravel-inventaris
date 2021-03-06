<?php

namespace App\Http\Requests\Stuff;

use Illuminate\Foundation\Http\FormRequest;

class CreateStuffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:stuffs',
            'spec' => 'required|string',
            'location' => 'required|string',
            'condition' => 'required|in:baru,bekas,rusak',
            'origin' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
