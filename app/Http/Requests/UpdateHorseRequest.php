<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHorseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             "name" => ['required',"string",'max:255'],
            "birthdate" => ["date","nullable"],
            "gender"=> ["string","nullable"],
            "passport_number" => ["string",'max:255',"nullable"],
            "FEI_number" => ["string",'max:255',"nullable"],
            "color" => ["string",'max:255',"nullable"],
            "data" => ["string",'max:255',"nullable"],

        ];
    }
}
