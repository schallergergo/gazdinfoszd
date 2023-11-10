<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;

class Horse extends Model
{

    use HasFactory, BelongsToTenant, SoftDeletes;
    use SoftDeletes;
    protected $guarded =[];

    public function owner (){
        return $this->belongsToMany(Owner::class)->where("active",1);
    }
    public function treatment (){
        return $this->hasMany(Treatment::class);
    }

    public function task (){
        return $this->belongsToMany(Task::class);
    }

    public function message (){
        return $this->hasMany(HorseMessage::class);
    }
        public function income (){
        return $this->hasMany(Income::class);
    }
    public function lesson (){
        return $this->hasMany(Lesson::class);
    }
}
