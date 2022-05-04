<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
           
            'title' => 'required|string|max:255',
            'authors'  => 'required|string|max:255',
            'description'   => 'nullable',
            'released_at'     => 'nullable|date|date_format:Y-m-d',
            'cover_image'     => 'nullable|url',
            'pages'     => 'required|numeric',
            'language_code'     => 'required|min:2|max:3',
            'isbn'     => 'nullable|max:13',
            'in_stock'     => 'required|numeric',
      
        ];
    }
}
