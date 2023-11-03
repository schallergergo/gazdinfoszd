<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "date_of_lesson" =>['required',"date_format:Y-m-d"],
            "rider_id" =>['required', "integer","min:0"],
            "horse_id" =>['required', "integer","min:0"],
            "price_of_lesson" =>['required', "integer","min:0"],
            "comments"=>['string',"max:256","nullable"],
        ];
    }
}
