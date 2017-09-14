<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaperRequest extends FormRequest
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
            'title' => 'required|min:10|max:100',
            'describe' => 'required|min:10',
            'parentcat' => 'required|numeric|integer',
            'category' => 'required|numeric|integer'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.min' => 'Tiêu đề phải có ít nhất 10 ký tự',
            'title.max' => 'Tiêu đề không được dài quá 100 ký tự',
            'describe.required' => 'Mô tả không được bỏ trống',
            'describe.min' => 'Mô tả phải có ít nhất 10 ký tự',
            'parentcat.required' => 'Danh mục không được bỏ trống',
            'parentcat.numeric' => 'Danh mục không hợp lệ',
            'parentcat.integer' => 'Danh mục không hợp lệ',
            'category.required' => 'Tiểu mục không được bỏ trống',
            'category.numeric' => 'Tiểu mục không hợp lệ',
            'category.integer' => 'Tiểu mục không hợp lệ'
        ];
    }
}
