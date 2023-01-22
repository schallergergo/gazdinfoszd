<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;

    public function owners (){
        return $this->belongsToMany(Owner::class);
    }
    public function treatments (){
        return $this->hasMany(Treatment::class);
    }
}
