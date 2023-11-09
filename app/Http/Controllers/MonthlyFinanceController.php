<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MonthlyFinance;
use Illuminate\Support\Facades\Lang;
class MonthlyFinanceController extends Controller
{
    public function getExpenseJson(){
        $expenses = MonthlyFinance::where("year",Carbon::now()->year)->orderBy("month")->get();
        return json_encode($expenses->pluck("expense"));
    }

     public function getIncomeJson(){
        $incomes = MonthlyFinance::where("year",Carbon::now()->year)->orderBy("month")->get();
        return json_encode($incomes->pluck("income"));
    }


    public function getExpensePieChartJson(){
        $now = Carbon::now();
        $month = MonthlyFinance::where("year",$now->year)->where("month",$now->month)->first();
        $expenses = $month->expenses;
        $expenseAmount = $expenses->sum("amount");
        $labels = getExpenseTypes();
        $labelLenght = count($labels);
        $translatedLabels=[];
        $amounts = array();
        foreach ($labels as $label){
            $labelAmount = $expenses->where("category",$label)->sum("amount");
            $amounts[] = $labelAmount;
            $expenseAmount-=$labelAmount;
             $translatedLabels[] = Lang::get($label);
        }
        $colors = array_slice(getChartColors()["color"],0,$labelLenght);
        $hover = array_slice(getChartColors()["hover"],0,$labelLenght);
        
        return json_encode(["labels"=>$translatedLabels,"amounts"=>$amounts,"color"=>$color,"hover"=>$hover]);
    }

    public function getIncomePieChartJson(){
        $now = Carbon::now();
        $month = MonthlyFinance::where("year",$now->year)->where("month",$now->month)->first();
        $incomes = $month->incomes;
        $translatedLabels=[];
        $incomeAmount = $incomes->sum("amount");
        $labels = getIncomeTypes();
        $labelLenght = count($labels);
        $amounts = array();
        foreach ($labels as $label){
            $labelAmount = $incomes->where("category",$label)->sum("amount");
            $amounts[] = $labelAmount;
            $incomeAmount-=$labelAmount;
            $translatedLabels[] = Lang::get($label);

        }

        $color = array_slice(getChartColors()["color"],0,$labelLenght);
        $hover = array_slice(getChartColors()["hover"],0,$labelLenght);
        return json_encode(["labels"=>$translatedLabels,"amounts"=>$amounts,"color"=>$color,"hover"=>$hover]);
    }



   

}
