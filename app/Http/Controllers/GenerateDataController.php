<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GenerateDataController extends Controller
{

    public function generate(){
        $now = now();
        \App\Models\Expense::factory(10)->create(["date"=>$now->year."-".$now->month."-".$now->day,"amount"=>rand(1,20)*500]);
        \App\Models\Income::factory(10)->create(["date"=>$now->year."-".$now->month."-".$now->day,"amount"=>rand(1,20)*500]);
        
    }
}
