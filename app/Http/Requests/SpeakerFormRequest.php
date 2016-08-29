<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class SpeakerFormRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'speaker-name' => 'required',
            'speaker-company' => 'required',
            'speaker-title' => 'required',
            'speaker-description' => 'required',
            'speaker-source' => 'required',
            // 'speaker-video' => 'required',
            'speaker-email' => 'email',
            // 'hidden-speaker-img' => 'required',
            
            // 'speaker-lang' => 'required',
            // 'speaker-lang-field' => 'required_if:speaker-lang,999',
            // 'image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'speaker-name.required' => '講師的姓名不得為空白',
            'speaker-company.required' => '講師的公司名稱不得為空白',
            'speaker-title.required' => '講師的職位不得為空白',
            'speaker-description.required' => '講師的簡單介紹不得為空白',
            'speaker-source.required' => '介紹的來源不得為空白',
            'speaker-video.required' => '請輸入Youtube影片連結',
            'speaker-email.email' => '格式必須為email格式，EX: abc@example.com',
            'hidden-speaker-img.required' => '請選擇講師的照片',
            // 'speaker-lang.required' => '講師演講語言不得為空白',
            // 'speaker-lang-field.required_if' => '其他語言不得為空白',
            
            // 'image' => '檔案必須是圖片格式 (jpeg, png, bmp, gif, or svg)'
        ];
    }
}