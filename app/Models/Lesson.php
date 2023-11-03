<?php

namespace App\Models;

use App\Models\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, BelongsToTenant, SoftDeletes;

        protected $guarded = [];

            public function horse (){
                return $this->belongsTo(Horse::class);
            }

            public function rider (){
                return $this->belongsTo(Rider::class);
            }

        protected static function booted(): void
                {
            static::created(function (Lesson $lesson) {

            $price =  $lesson->price_of_lesson;
            if ($price==0) return;

            Income::create([
                "horse_id"=>$lesson->horse_id,
                "amount"=>$price,
                "date"=>$lesson->date_of_lesson,
                "category"=>"lesson",
                "description"=>$lesson->rider->name." + ".$lesson->horse->name,
                "tenant_id"=>$lesson->tenant_id,
            ]);

        });
        }
}
