<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/27/2018
 * Time: 9:51 PM
 */

namespace App\Http\Requests;


class UsersRequest extends Request
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
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|min:6|same:password',
                'phone_number' => 'nullable|max:255|min:9',
                'address' => 'nullable|max:255',
                'avatar' => 'nullable|mimes:jpeg,jpg,png,gif',
                'group_id' => 'required',
            ];
        } elseif ($this->method() == "PUT") {
            $validation = [
            ];

            if ($this->request->get('change_password') == true) {
                $validation['password'] = 'required|min:6|confirmed';
                $validation['password_confirmation'] = 'required|min:6|same:password';
            }
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
            'name.required' => 'Bạn chưa nhập tên thành viên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự.',
            'password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu.',
            'password_confirmation.same' => 'Mật khẩu nhập lại không khớp với mật khẩu.',
            'phone_number.max' => 'Số điện thoại không phù hợp.',
            'phone_number.min' => 'Số điện thoại không phù hợp.',
            'avatar.mimes' => 'Định dạng ảnh cho phép là: jpg, jpeg, gif, png.',
        ];
    }
}