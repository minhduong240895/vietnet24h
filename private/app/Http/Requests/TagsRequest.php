<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Types;

class TagsRequest extends FormRequest
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
                'name' => 'required|unique:tags',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
                'name' => 'required|unique:tags,name,'.$this->id,
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
            'name.required' => 'Bạn chưa nhập tên tag.',
            'name.unique' => 'Tên tag đã tồn tại.',
        ];
    }
}
