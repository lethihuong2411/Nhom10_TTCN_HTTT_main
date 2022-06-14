<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' =>'required|email|max:50',
            'password' =>'required|max:25',
        ];
    }
    public function messages()
    {
        return [
            'username.email' => 'Không đúng định dạng email',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'username.max' => 'Tên đăng nhập không quá 60 ký tự',
            'password.max' => 'Mật khẩu không quá 25 ký tự',
        ];
    }
}
