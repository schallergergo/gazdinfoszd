<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonthlyFinance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rider;
use App\Models\Owner;

class HomeController extends Controller
{
    public function dashboard(){
        
        $user = Auth::user();

        if ($user->isRider()) return $this->riderIndex($user);
        if ($user->isOwner()) return $this->ownerIndex($user);
        if ($user->isGroom()) return $this->groomIndex($user);
        $now = Carbon::now();
        $currentMonth = MonthlyFinance::firstOrCreate(["year"=>$now->year,"month"=>$now->month]);
        $currentYear = MonthlyFinance::where("year",$now->year)->get();

        return view("dashboard",[
                        "currentMonth"=>$currentMonth,
                        "yearlyIncome"=>$currentYear->sum("income"),
                        "yearlyExpense"=>$currentYear->sum("expense"),
                    ]);

    }


    private function riderIndex(User $user){
        $rider = Rider::where("user_id",$user->id)->first();
        if ($rider == null) return view("home.rider",["lessons"=>collect(),"found"=>false]);

        $lessons = $rider->lesson()->orderByDesc("created_at")->paginate(20);
        return view("home.rider",["lessons"=>$lessons,"found"=>true]);
    }

    private function OwnerIndex(User $user){
        $owner = Owner::where("user_id",$user->id)->first();
        if ($owner == null) return view("home.owner",["horses"=>collect(),"found"=>false]);

        $horses = $owner->horse()->orderByDesc("name")->paginate(20);
        return view("home.owner",["horses"=>$horses,"found"=>true]);
    }

        private function groomIndex(User $user){
        return view("home.groom",[]);
    }

}
