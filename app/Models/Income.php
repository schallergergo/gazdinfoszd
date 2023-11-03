<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Income extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;
    protected $guarded = [];

    public function horse()
    {
        return $this->belongsTo(Horse::class);
    }

        protected static function booted(): void
    {
        static::created(function (Income $income) {
            $date = Carbon::createFromFormat('Y-m-d', $income->date);
            $monthlyFinance = MonthlyFinance::firstOrCreate([
                "year"=>$date->year,
                "month"=>$date->month,
                "tenant_id"=>$income->tenant_id,
            ]);
            $monthlyFinance->income = $monthlyFinance->income+$income->amount;
            $monthlyFinance->save();
            $income->monthly_finance_id = $monthlyFinance->id;
            $income->save();
            });

        static::deleting(function (Income $income) {
            $date = Carbon::createFromFormat('Y-m-d', $income->date);
            $monthlyFinance = MonthlyFinance::firstOrCreate([
                "year"=>$date->year,
                "month"=>$date->month,
            ]);
            $monthlyFinance->income = $monthlyFinance->income-$income->amount;
            $monthlyFinance->save();
            });
    }

    


}
