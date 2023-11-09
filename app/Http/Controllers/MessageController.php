<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorseMessage;

class MessageController extends Controller
{
    public function show(HorseMessage $message){
        

        $message->read = 1;
        $message->save();
        return $message;
    }
}
