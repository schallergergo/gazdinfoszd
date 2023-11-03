<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "date" => ['required',"date"],
            'horse_id' => ['integer',"nullable"],
            "amount" =>['required', "integer","min:0"],
            "description"=>['required','string',"max:256"],
        ];
    }
}
