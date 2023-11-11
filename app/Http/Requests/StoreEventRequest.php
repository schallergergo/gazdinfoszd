<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "description" => ['required',"string",'max:255'],
            "event_day"=>['required',"date"],
            'start' => ['required'],
            "end" =>['required'],
            "venue_id"=>['required','integer'],
        ];
    }
}
