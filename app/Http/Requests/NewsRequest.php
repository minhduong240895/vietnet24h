<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
    public function rules(){
        $validation = [];
        if ($this->method() == "POST") {
            $validation = [
                'title' => 'required',
                'image' => 'required|mimes:jpg,png',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
            ];

        }

        return $validation;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'website.url' => 'Not a valid URL format.',
        ];
    }
}
