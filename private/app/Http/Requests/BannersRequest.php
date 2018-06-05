<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannersRequest extends FormRequest
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
                'link' => 'required',
                'position' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:4096',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
                'link' => 'required',
                'position' => 'nullable',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:4096',
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
            'link.required' => 'Bạn chưa nhập đường dẫn liên kết tới quảng cáo.',
            'position.required' => 'Bạn chưa chọn vị trí hiển thị ảnh quảng cáo.',
            'image.required' => 'Bạn chưa chọn ảnh quảng cáo.',
            'image.mimes' => 'Định dạng ảnh không phù hợp(jpeg,jpg,png,gif).',
            'image.max' => 'Kích thước ảnh quá lớn(tối đá 4mb).',
        ];
    }
}
