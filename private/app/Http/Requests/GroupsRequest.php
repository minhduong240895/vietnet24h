<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupsRequest extends FormRequest
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

    public function rules(){
        $validation = [];
        if ($this->method() == "POST") {
            $validation = [
                'name' => 'required|unique:groups|name',
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
            'name.required' => 'Bạn chưa nhập tên nhóm.',
            'name.unique' => 'Tên nhóm đã tồn tại.',
        ];
    }
}
