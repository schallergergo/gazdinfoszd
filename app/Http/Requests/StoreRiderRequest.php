<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name"=>['required','string',"max:256","nullable"],
            "normal_price" =>['required',"integer","min:0"],
            "user_id" =>[ "integer","min:0","nullable"],
            "email" =>['required', "email"],
            "phone"=>["string","min:0","nullable"],

        ];
    }
}
