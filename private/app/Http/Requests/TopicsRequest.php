<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicsRequest extends FormRequest
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
                'name' => 'required|unique:topics',
                'slug' => 'nullable|max:255|min:6|unique:topics',
                'category_id' => 'required|integer|min:0',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
                'name' => 'required|unique:topics,name,'.$this->id,
                'slug' => 'nullable|max:255|min:6|unique:topics,slug,'.$this->id,
                'category_id' => 'required|integer|min:0',
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
            'slug.required' => 'Bạn chưa nhập slug.',
            'slug.unique' => 'Slug đã tồn tại.',
            'slug.max' => 'Slug quá dài.',
            'slug.min' => 'Slug quá ngắn.',
            'category_id.required' => 'Bạn chưa chọn danh mục cha.',
            'category_id.integer' => 'Danh mục cha không hợp lệ.',
        ];
    }
}
