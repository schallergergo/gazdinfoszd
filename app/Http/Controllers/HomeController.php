<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonthlyFinance;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard(){

        $now = Carbon::now();
        $currentMonth = MonthlyFinance::firstOrCreate(["year"=>$now->year,"month"=>$now->month]);
        $currentYear = MonthlyFinance::where("year",$now->year)->get();

        return view("dashboard",[
                        "currentMonth"=>$currentMonth,
                        "yearlyIncome"=>$currentYear->sum("income"),
                        "yearlyExpense"=>$currentYear->sum("expense"),


                    ]);

    }


}
