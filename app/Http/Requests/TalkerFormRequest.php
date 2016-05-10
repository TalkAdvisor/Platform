<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class TalkerFormRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'talker-name' => 'required',
            'talker-en-name' => 'required',
            'talker-company' => 'required',
            'talker-lang' => 'required',
            'talker-lang-field' => 'required_if:talker-lang,999'
        ];
    }

    public function messages()
    {
        return [
            'talker-name.required' => '講師的公司名稱不得為空白',
            'talker-en-name.required' => '講師的公司名稱不得為空白',
            'talker-company.required' => '講師的公司名稱不得為空白',
            'talker-lang.required' => '講師演講語言不得為空白',
            'talker-lang-field.required_if' => '其他語言不得為空白'
        ];
    }
}