<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;

class Treatment extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;
    use SoftDeletes;
    protected $guarded =[];

    public function horse(){
        return $this->belongsTo(Horse::class);
    }

    public function last_updated_by(){
        return  $this->belongsTo(User::class,"last_updated_by");
    }

            protected static function booted(): void
                {
            static::created(function (Treatment $treatment) {


                $notification = $treatment->date_of_notification;

            if ( $notification!= null)

            {
                $task = Task::create([
                    "task"=> $treatment->horse->name." ".$treatment->type_of_treatment. " + ". $treatment->comments,
                    "task_day"=> $treatment->date_of_treatment,
                    "task_start"=> "00:00",
                    "task_end"=> "00:00",
                    "tenant_id"=>$treatment->tenant_id,

                ]);

            $admins = User::where("role","admin")->get();
            foreach($admins as $admin)
            $admin->task()->attach($task->id);

            }


            $price =  $treatment->cost_of_treatment;
            if ($price!=0){

            Expense::create([
                "tenant_id"=>$treatment->tenant_id,
                "horse_id"=>$treatment->horse_id,
                "amount"=>$treatment->cost_of_treatment,
                "date"=>$treatment->date_of_treatment,
                "category"=>"treatment",
                "description"=>$treatment->type_of_treatment." + ".$treatment->horse->name,
            ]);
        }
        });
        }
}
