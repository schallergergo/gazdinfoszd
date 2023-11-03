<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Expense extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;
    protected $guarded = [];
     public function horse()
    {
        return $this->belongsTo(Horse::class);
    }
    protected static function booted(): void
    {
        static::created(function (Expense $expense) {
            $date = Carbon::createFromFormat('Y-m-d', $expense->date);
            $monthlyFinance = MonthlyFinance::firstOrCreate([
                "year"=>$date->year,
                "month"=>$date->month,
                "tenant_id"=>$expense->tenant_id,
            ]);
            $monthlyFinance->expense = $monthlyFinance->expense+$expense->amount;
            $monthlyFinance->save();
            $expense->monthly_finance_id = $monthlyFinance->id;
            $expense->save();
            });

         static::deleting(function (Expense $expense) {
            $date = Carbon::createFromFormat('Y-m-d', $expense->date);
            $monthlyFinance = MonthlyFinance::firstOrCreate([
                "year"=>$date->year,
                "month"=>$date->month,
            ]);
            $monthlyFinance->expense = $monthlyFinance->expense-$expense->amount;
            $monthlyFinance->save();
            });
    
    }

   
}
