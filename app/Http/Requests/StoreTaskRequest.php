<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "task" => ['required',"string",'max:255'],
            "task_day"=>['required',"date"],
            "task_start" => ['required'], 
            "task_end"=>['required'], 
            "description"=>["string",'max:1000',"nullable"],
            "horses"=>["array","nullable"],
        ];
    }
}
