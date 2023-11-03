<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
            "phone_no" => ['required',"string",'max:255'], 
            "user_id"=> ["integer","nullable"],
            "email" => ["string","email"],
             "comments"=> ["string","nullable"],
        ];
    }
}
