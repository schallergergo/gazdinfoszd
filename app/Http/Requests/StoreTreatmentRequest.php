<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "date_of_treatment" => ["date"],
            "type_of_treatment"=> ["string"],
            "cost_of_treatment" => ["integer",'max:100000000'],
            "date_of_notification"=> ["date","nullable"],
            "comments"=>["string", "nullable"],
            "horses"=>[]
        ];
    }
}
