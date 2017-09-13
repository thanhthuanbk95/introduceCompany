<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:9',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Vui lòng nhập Số điện thoại',
            'phone.numeric' => 'Số điện thoại không đúng',
            'phone.min' => 'Số điện thoại không đúng',
            'content.required' => 'Vui lòng nhập Nội dung muốn gửi'
        ];
    }
}
