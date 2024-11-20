<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'ar_title' => 'required',
            'ar_img' => 'required',
            'ar_content' => 'required',
            'ar_url' => 'required'
        ];
    }

    public function messages(){
        return [
            'ar_title.required' => 'Nhập tiêu đề',
            'ar_img.required' => 'Nhập ảnh',
            'ar_content.required' => 'Nhập nội dung',
            'ar_url.required' => 'Nhập liên kết'
        ];
    }
}