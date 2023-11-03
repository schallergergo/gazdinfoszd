<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BelongsToTenant;

class Task extends Model
{
    use HasFactory, BelongsToTenant,SoftDeletes;
    protected $guarded =[];

    public function user(){

        return $this->belongsToMany(User::class);
    }

    public function horse(){

        return $this->belongsToMany(Horse::class);
    }

    public function message()
    {
        return $this->hasMany(TaskMessage::class);
    }
}
