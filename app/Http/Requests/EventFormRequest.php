<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class EventFormRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'topic' => 'required',
            'date' => 'required',
            'city' => 'required',
            'city-field' => 'required_if:city,999',
            'location' => 'required',
            'location-field' => 'required_if:location,999',
            'organizer' => 'required',
            'organizer-field' => 'required_if:organizer,999',
        ];
    }

    public function messages()
    {
        return [
            'topic.required' => '演講的講題不得為空白',
            'date.required' => '演講的日期不得為空白',
            'city-field.required_if' => '其他城市不得為空白',
            'location-field.required_if' => '其他地點不得為空白',
            'organizer-field.required_if' => '其他主辦單位不得為空白',
            'city.required' => '演講的城市不得為空白',
            'location.required' => '演講的地點不得為空白',
            'organizer.required' => '演講的主辦單位不得為空白'
        ];
    }

    /*public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }*/

}