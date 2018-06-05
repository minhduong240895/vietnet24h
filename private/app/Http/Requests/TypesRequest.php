<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Types;

class TypesRequest extends FormRequest
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
                'name' => 'required|unique:types',
                'price' => 'required|integer|min:0',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
                'name' => 'required|unique:types,name,'.$this->id,
                'price' => 'required|integer|min:0',
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
            'name.required' => 'Bạn chưa nhập tên loại bài viết.',
            'name.unique' => 'Tên loại bài viết đã tồn tại.',
            'price.required' => 'Bạn chưa nhập mức nhuận bút.',
            'price.integer' => 'Mức nhuận bút phải là số nguyên.',
        ];
    }
}
