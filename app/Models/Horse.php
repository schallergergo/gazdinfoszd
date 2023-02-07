<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;

class Horse extends Model
{

    use HasFactory, BelongsToTenant;
    use SoftDeletes;
    protected $guarded =[];

    public function owners (){
        return $this->belongsToMany(Owner::class);
    }
    public function treatments (){
        return $this->hasMany(Treatment::class);
    }

    public function tasks (){
        return $this->belongsToMany(Task::class);
    }
}
