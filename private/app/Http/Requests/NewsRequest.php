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
                'title' => 'required|unique:news,title',
                'slug' => 'nullable|max:255|min:6|unique:news',
                'capo' => 'required|min:6',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:4096',
                'type_id' => 'required|integer|min:1',
                'tags' => 'required',
                'related_news' => 'required',
                'sibling_news' => 'required',
                'topic_id' => 'required|integer|min:1',
                'source' => 'required',
                'nickname' => 'required',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
                'capo' => 'required|min:6',
                'description' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:4096',
                'nickname' => 'required',
                'source' => 'required',
                'price' => 'nullable|integer',
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
            'title.required' => 'Bạn chưa nhập tiêu đề.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'slug.max' => 'Slug bạn nhập quá dài.',
            'slug.min' => 'Slug bạn nhập quá ngắn.',
            'slug.unique' => 'Slug bạn nhập đã tồn tại.',
            'capo.required' => 'Bạn chưa nhập capo.',
            'capo.min' => 'Capo quá ngắn.',
            'description.required' => 'Bạn chưa nhập nội dung.',
            'image.required' => 'Bạn chọn ảnh hiển thị.',
            'image.mimes' => 'Định dạng ảnh cho phép là: jpg, jpeg, gif, png.',
            'image.max' => 'Kích thước ảnh bạn chọn quá lớn.',
            'type_id.required' => 'Bạn chưa chọn loại bài viết.',
            'type_id.integer' => 'Bạn chưa chọn loại bài viết.',
            'type_id.min' => 'Bạn chưa chọn loại bài viết.',
            'topic_id.required' => 'Bạn chưa chọn danh mục.',
            'topic_id.integer' => 'Bạn chưa chọn danh mục.',
            'topic_id.min' => 'Bạn chưa chọn danh mục.',
            'source.required' => 'Bạn chưa nhập nguồn bài viết.',
            'nickname.required' => 'Bạn chưa nhập bút danh.',
            'tags.required' => 'Bạn chưa chọn tags.',
            'related_news.required' => 'Bạn chưa chọn tin liên quan.',
            'sibling_news.required' => 'Bạn chưa chọn bài liên quan.',
        ];
    }
}
